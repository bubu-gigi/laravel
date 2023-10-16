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
        if(is_numeric($attributes->cost_in_credits))
            $this->model->cost_in_credits       =  $attributes->cost_in_credits;
        $this->model->length       =  ApiHelper::validateInt($attributes->length);
        if(is_numeric($attributes->max_atmosphering_speed))
            $this->model->max_atmosphering_speed       =  $attributes->max_atmosphering_speed;
        if(is_numeric($attributes->crew))
            $this->model->crew       =  $attributes->crew;
        if(is_numeric($attributes->passengers))
            $this->model->passengers       =  $attributes->passengers;
        if(is_numeric($attributes->cargo_capacity))
            $this->model->cargo_capacity       =  $attributes->cargo_capacity;
        $this->model->consumables       =  $attributes->consumables;
        if(is_numeric($attributes->hyperdrive_rating))
            $this->model->hyperdrive_rating       =  $attributes->hyperdrive_rating;
        if(is_numeric($attributes->MGLT))
            $this->model->MGLT       =  $attributes->MGLT;
        $this->model->starship_class       =  $attributes->starship_class;
        $this->model->save();
    }
    public function all()
    {
        return $this->model::all();
    }
    public function find(int $id): Starship
    {
        return $this->model::findOrFail($id);
    }
    public function delete(int $id): void
    {
        //$this->model->destroy($id);
        $starship = $this->find($id);
        $starship->delete();
    }
}
