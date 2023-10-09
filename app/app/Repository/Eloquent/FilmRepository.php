<?php

namespace App\Repository\Eloquent;


use App\Models\Film;
use App\Repository\FilmRepositoryInterface;
use stdClass;

class FilmRepository extends BaseRepository implements FilmRepositoryInterface
{
    protected $model;
    public function __construct(Film $model)
    {
       $this->model = $model;
    }
    public function insert(stdClass $attributes): void
    {
        $this->model = new Film();
        $this->model->title = $attributes->title;
        $this->model->episode_id = $attributes->episode_id;
        $this->model->opening_crawl = $attributes->opening_crawl;
        $this->model->director = $attributes->director;
        $this->model->producer = $attributes->producer;
        $this->model->release_date = $attributes->release_date;
        $this->model->save();
        BaseRepository::insertCharacters($attributes->characters, $this->model);
        BaseRepository::insertPlanets($attributes->planets, $this->model);
        BaseRepository::insertStarships($attributes->starships, $this->model);
        BaseRepository::insertSpecies($attributes->species, $this->model);
        BaseRepository::insertVehicles($attributes->vehicles, $this->model);
        $this->model->save();
    }
}
