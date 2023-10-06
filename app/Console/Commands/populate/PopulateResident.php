<?php

namespace App\Console\Commands\Populate;

use Illuminate\Console\Command;
use App\Repository\ResidentRepositoryInterface;

class PopulateResident extends Command
{
    private $residentRepository;
    protected $signature = 'app:populate:resident';
    protected $description = 'Command description';

    public function __construct(ResidentRepositoryInterface $residentRepository)
    {
        $this->residentRepository = $residentRepository;
        parent::__construct();
    }

    public function handle()
    {
        $response = file_get_contents("https://swapi.dev/api/people");
        $results = json_decode($response)->results;
        foreach ($results as $resident)
        {
            print_r($resident);
            $this->residentRepository->insert($resident);
        }
    }
}
