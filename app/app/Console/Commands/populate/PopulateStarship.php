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
        $response = file_get_contents("https://swapi.dev/api/starships");
        $results = json_decode($response)->results;
        foreach ($results as $starship)
            $this->starshipRepository->insert($starship);
    }
}
