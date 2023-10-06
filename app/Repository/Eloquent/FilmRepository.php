<?php

namespace App\Repository\Eloquent;


use App\Models\Film;
use Illuminate\Database\Eloquent\Model;
use App\Repository\FilmRepositoryInterface;
use Illuminate\Support\Collection;
use stdClass;

class FilmRepository implements FilmRepositoryInterface
{
    protected $model;
    public function __construct(Film $model)
    {
       $this->model = $model;
    }
    public function all(): Collection
    {
        return $this->model->all();
    }
    public function find($id): ?Model
    {
        return $this->model->find($id);
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
        foreach($attributes->characters as $c)
            $this->model->characters()->attach(substr($c, 29, -1));
        foreach($attributes->planets as $p)
            $this->model->planets()->attach(substr($p, 30, -1));
        foreach($attributes->starships as $s)
            $this->model->starships()->attach(substr($s, 32, -1));
        foreach($attributes->vehicles as $v)
            $this->model->vehicles()->attach(substr($v, 31, -1));
        foreach($attributes->species as $s)
            $this->model->species()->attach(substr($v, 31, -1));
        $this->model->save();
    }
}
