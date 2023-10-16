<?php

namespace App\Console\Commands\Populate;

use Illuminate\Console\Command;
use App\Repository\StarshipRepositoryInterface;
class PopulateStarship extends Command
{
    private $starshipRepository;
    protected $signature = 'app:populate:starship';
    protected $description = '';
    public function __construct(StarshipRepositoryInterface $starshipRepository)
    {
        $this->starshipRepository = $starshipRepository;
        parent::__construct();
    }

    public function handle()
    {
        $firstTime = true;
        $response = file_get_contents("https://swapi.dev/api/starships");
        $results = json_decode($response);
        while(true)
        {
            if($firstTime)
            {
                foreach ($results->results as $starship)
                    $this->starshipRepository->insert($starship);
                $firstTime = false;
            }
            if(is_null($results->next))
                break;
            else
            {
                $results = json_decode(file_get_contents($results->next));
                foreach ($results->results as $starship)
                    $this->starshipRepository->insert($starship);
            }
        }
    }
}
