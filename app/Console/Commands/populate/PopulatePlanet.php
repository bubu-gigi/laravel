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
        $firstTime = true;
        $response = file_get_contents("https://swapi.dev/api/planets");
        $results = json_decode($response);
        while(true)
        {
            if($firstTime)
            {
                foreach ($results->results as $planet)
                    $this->planetRepository->insert($planet);
                $firstTime = false;
            }
            if(is_null($results->next))
                break;
            else
            {
                $results = json_decode(file_get_contents($results->next));
                foreach ($results->results as $planet)
                    $this->planetRepository->insert($planet);
            }
        }
    }
}
