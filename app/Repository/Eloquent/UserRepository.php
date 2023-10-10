<?php

namespace App\Repository\Eloquent;

use App\Helpers\ApiHelper;
use App\Models\User;
use App\Repository\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use stdClass;
use Illuminate\Support\facades\Http;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    protected $model;
    public function __construct(User $model)
    {
       $this->model = $model;
    }
    public function insert(stdClass $attributes): void
    {
        $this->model = new User();
        $this->model->name       =  $attributes->name;
        $this->model->height     =  $attributes->height;
        if(is_numeric($attributes->mass))
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

    public function apiInsert(): void
    {
        Http::post("http://127.0.0.1:8000/users/insert", [
            'name' => 'guglielmo',
            'height' => 185,
            'mass' => 78,
            'hair_color' => 'brown',
            'skin_color' => 'white',
            'eye_color' => 'brown-green',
            'birth_year' => '10/05/2002',
            'gender' => 'male',
            'planet_id' => 8,
            'specie_id' => ''
        ]);
    }
    public function all(): Collection
    {
        return $this->model::all();
    }
    public function find(int $id): User
    {
        return $this->model::findOrFail($id);
    }
    public function delete(int $id): void
    {
        //$this->model->destroy($id);
        $user = $this->find($id);
        $user->delete();
    }
}
