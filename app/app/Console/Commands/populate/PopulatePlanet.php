<?php

namespace App\Console\Commands\Populate;

use Illuminate\Console\Command;
use App\Repository\PlanetRepositoryInterface;

class PopulatePlanet extends Command
{
    private $planetRepository;
    protected $signature = 'app:populate:planet';
    protected $description = '';

    public function  __construct(PlanetRepositoryInterface $planetRepository)
    {
        $this->planetRepository = $planetRepository;
        parent::__construct();
    }

    public function handle()
    {
        $response = file_get_contents("https://swapi.dev/api/planets");
        $results = json_decode($response)->results;
        foreach ($results as $planet)
            $this->planetRepository->insert($planet);
    }
}
