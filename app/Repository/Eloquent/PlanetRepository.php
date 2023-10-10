<?php

namespace App\Repository\Eloquent;


use App\Models\Planet;
use App\Repository\PlanetRepositoryInterface;
use stdClass;

class PlanetRepository extends BaseRepository implements PlanetRepositoryInterface
{
    protected $model;

    public function __construct(Planet $model)
    {
       $this->model = $model;
    }

    public function insert(stdClass $attributes): void
    {
        $this->model = new Planet();
        $this->model->name = $attributes->name;
        if(is_numeric($attributes->rotation_period))
            $this->model->rotation_period = $attributes->rotation_period;
        if(is_numeric($attributes->orbital_period))
            $this->model->orbital_period = $attributes->orbital_period;
        if(is_numeric($attributes->diameter))
            $this->model->diameter = $attributes->diameter;
        $this->model->climate = $attributes->climate;
        $this->model->gravity = $attributes->gravity;
        $this->model->terrain = $attributes->terrain;
        if(is_numeric($attributes->surface_water))
            $this->model->surface_water = $attributes->surface_water;
        if(is_numeric($attributes->population))
        $this->model->population = $attributes->population;
        $this->model->save();
        BaseRepository::insertResidents($attributes->residents, $this->model);
        $this->model->save();
    }
}
