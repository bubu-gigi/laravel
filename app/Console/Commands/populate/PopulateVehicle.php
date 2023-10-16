<?php

namespace App\Console\Commands\Populate;

use Illuminate\Console\Command;
use App\Repository\VehicleRepositoryInterface;

class PopulateVehicle extends Command
{
    private $vehicleRepository;
    protected $signature = 'app:populate:vehicle';
    protected $description = '';
    public function __construct(VehicleRepositoryInterface $vehicleRepository)
    {
        $this->vehicleRepository = $vehicleRepository;
        parent::__construct();
    }

    public function handle()
    {
        $firstTime = true;
        $response = file_get_contents("https://swapi.dev/api/vehicles");
        $results = json_decode($response);
        while(true)
        {
            if($firstTime)
            {
                foreach ($results->results as $vehicle)
                    $this->vehicleRepository->insert($vehicle);
                $firstTime = false;
            }
            if(is_null($results->next))
                break;
            else
            {
                $results = json_decode(file_get_contents($results->next));
                foreach ($results->results as $vehicle)
                    $this->vehicleRepository->insert($vehicle);
            }
        }
    }
}
