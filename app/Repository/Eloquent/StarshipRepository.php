<?php

namespace App\Repository\Eloquent;

use App\Helpers\ApiHelper;
use App\Models\Starship;
use App\Repository\StarshipRepositoryInterface;
use stdClass;

class StarshipRepository extends BaseRepository implements StarshipRepositoryInterface
{
    protected $model;
    public function __construct(Starship $model)
    {
       $this->model = $model;
    }
    public function insert(stdClass $attributes): void
    {
        $this->model = new Starship();
        $this->model->name       =  $attributes->name;
        $this->model->model       =  $attributes->model;
        $this->model->manufacturer       =  $attributes->manufacturer;
        $this->model->cost_in_credits       =  $attributes->cost_in_credits;
        $this->model->length       =  $attributes->length;
        $this->model->max_atmosphering_speed       =  $attributes->max_atmosphering_speed;
        $this->model->crew       =  $attributes->crew;
        $this->model->passengers       =  $attributes->passengers;
        $this->model->cargo_capacity       =  $attributes->cargo_capacity;
        $this->model->consumables       =  $attributes->consumables;
        $this->model->hyperdrive_rating       =  $attributes->hyperdrive_rating;
        $this->model->MGLT       =  $attributes->MGLT;
        $this->model->starship_class       =  $attributes->starship_class;
        $this->model->save();
    }
}
