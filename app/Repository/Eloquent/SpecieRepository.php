<?php

namespace App\Repository\Eloquent;

use App\Helpers\ApiHelper;
use App\Models\Specie;
use App\Repository\SpecieRepositoryInterface;
use stdClass;

class SpecieRepository extends BaseRepository implements SpecieRepositoryInterface
{
    protected $model;
    public function __construct(Specie $model)
    {
       $this->model = $model;
    }
    public function insert(stdClass $attributes): void
    {
        $this->model = new Specie();
        $this->model->name       =  $attributes->name;
        $this->model->classification       =  $attributes->classification;
        $this->model->designation     =  $attributes->designation;
        if(is_numeric($attributes->average_height))
            $this->model->average_height       =  $attributes->average_height;
        $this->model->skin_colors =  $attributes->skin_colors;
        $this->model->hair_colors =  $attributes->hair_colors;
        $this->model->eye_colors  =  $attributes->eye_colors;
        if(is_numeric($attributes->average_lifespan))
            $this->model->average_lifespan =  $attributes->average_lifespan;
        if(!(is_null($attributes->homeworld)))
            $this->model->planet_id     =  ApiHelper::validateApi($attributes->homeworld);
        $this->model->language  =  $attributes->language;
        $this->model->save();
    }

    public function all()
    {
        return $this->model::all();
    }
    public function find(int $id): Specie
    {
        return $this->model::findOrFail($id);
    }
    public function delete(int $id): void
    {
        //$this->model->destroy($id);
        $specie = $this->find($id);
        $specie->delete();
    }
}
