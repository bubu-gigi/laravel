<?php

namespace App\Repository\Eloquent;

use App\Helpers\ApiHelper;
use App\Models\Vehicle;
use App\Repository\VehicleRepositoryInterface;
use stdClass;

class VehicleRepository extends BaseRepository implements VehicleRepositoryInterface
{
    protected $model;
    public function __construct(Vehicle $model)
    {
       $this->model = $model;
    }
    public function insert(stdClass $attributes): void
    {
        $this->model = new Vehicle();
        $this->model->name       =  $attributes->name;
        $this->model->model       =  $attributes->model;
        $this->model->manufacturer     =  $attributes->manufacturer;
        if(is_numeric($attributes->cost_in_credits))
            $this->model->cost_in_credits =  $attributes->cost_in_credits;
        $this->model->length =  $attributes->length;
        $this->model->max_atmosphering_speed  =  $attributes->max_atmosphering_speed;
        $this->model->crew  =  $attributes->crew;
        $this->model->passengers  =  $attributes->passengers;
        if(is_numeric($attributes->cargo_capacity))
            $this->model->cargo_capacity  =  $attributes->cargo_capacity;
        $this->model->consumables  =  $attributes->consumables;
        $this->model->vehicle_class  =  $attributes->vehicle_class;
        $this->model->save();
    }
}
