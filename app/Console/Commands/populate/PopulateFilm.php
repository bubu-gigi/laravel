<?php

namespace App\Console\Commands\Populate;

use Illuminate\Console\Command;
use App\Repository\FilmRepositoryInterface;

class PopulateFilm extends Command
{
    private $filmRepository;
    protected $signature = 'app:populate:film';
    protected $description = '';

    public function  __construct(FilmRepositoryInterface $filmRepository)
    {
        $this->filmRepository = $filmRepository;
        parent::__construct();
    }

    public function handle()
    {
        $firstTime = true;
        $response = file_get_contents("https://swapi.dev/api/films");
        $results = json_decode($response);
        while(true)
        {
            if($firstTime)
            {
                foreach ($results->results as $film)
                    $this->filmRepository->insert($film);
                $firstTime = false;
            }
            if(is_null($results->next))
                break;
            else
            {
                $results = json_decode(file_get_contents($results->next));
                foreach ($results->results as $film)
                    $this->filmRepository->insert($film);
            }
        }
    }
}
