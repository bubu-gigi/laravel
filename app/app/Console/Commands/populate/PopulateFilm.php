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
        $response = file_get_contents("https://swapi.dev/api/films");
        $results = json_decode($response)->results;
        foreach ($results as $film)
            $this->filmRepository->insert($film);
    }
}
