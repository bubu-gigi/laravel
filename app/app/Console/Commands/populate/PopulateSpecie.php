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
        $response = file_get_contents("https://swapi.dev/api/species");
        $results = json_decode($response)->results;
        foreach ($results as $specie)
            $this->specieRepository->insert($specie);
    }
}
