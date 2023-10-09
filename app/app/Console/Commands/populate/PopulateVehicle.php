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
        $response = file_get_contents("https://swapi.dev/api/vehicles");
        $results = json_decode($response)->results;
        foreach ($results as $vehicle)
            $this->vehicleRepository->insert($vehicle);
    }
}
