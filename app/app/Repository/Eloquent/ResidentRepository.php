<?php

namespace App\Repository\Eloquent;

use App\Helpers\ApiHelper;
use App\Models\Resident;
use App\Repository\ResidentRepositoryInterface;
use stdClass;

class ResidentRepository implements ResidentRepositoryInterface
{
    protected $model;
    public function __construct(Resident $model)
    {
       $this->model = $model;
    }
    public function insert(stdClass $attributes): void
    {
        $this->model = new Resident();
        $this->model->name       =  $attributes->name;
        $this->model->height     =  $attributes->height;
        $this->model->mass       =  $attributes->mass;
        $this->model->hair_color =  $attributes->hair_color;
        $this->model->skin_color =  $attributes->skin_color;
        $this->model->eye_color  =  $attributes->eye_color;
        $this->model->birth_year =  $attributes->birth_year;
        $this->model->gender     =  $attributes->gender;
        $this->model->planet_id  =  ApiHelper::validateApi($attributes->homeworld);
        $this->model->save();
        BaseRepository::insertSpecies($attributes->species, $this->model);
        BaseRepository::insertStarships($attributes->starships, $this->model);
        BaseRepository::insertVehicles($attributes->vehicles, $this->model);
        $this->model->save();
    }

}
