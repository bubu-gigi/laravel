<?php

namespace App\Console\Commands\Populate;

use Illuminate\Console\Command;
use App\Repository\SpecieRepositoryInterface;

class PopulateSpecie extends Command
{
    private $specieRepository;
    protected $signature = 'app:populate:specie';
    protected $description = '';
    public function __construct(SpecieRepositoryInterface $specieRepository)
    {
        $this->specieRepository = $specieRepository;
        parent::__construct();
    }

    public function handle()
    {
        $firstTime = true;
        $response = file_get_contents("https://swapi.dev/api/species");
        $results = json_decode($response);
        while(true)
        {
            if($firstTime)
            {
                foreach ($results->results as $specie)
                    $this->specieRepository->insert($specie);
                $firstTime = false;
            }
            if(is_null($results->next))
                break;
            else
            {
                $results = json_decode(file_get_contents($results->next));
                foreach ($results->results as $specie)
                    $this->specieRepository->insert($specie);
            }
        }
    }
}
