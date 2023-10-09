<?php

namespace App\Repository\Eloquent;

use App\Repository\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\ValidateApi;

class BaseRepository implements BaseRepositoryInterface
{
    public static function insertCharacters(array $characters, Model $model): Model
    {
        if(!(is_null($characters)))
            foreach($characters as $c)
                $model->characters()->attach(ValidateApi::findId($c));
        return $model;
    }
    public static function insertFilms(array $films, Model $model): Model
    {
        if(!(is_null($films)))
            foreach($films as $f)
                $model->films()->attach(ValidateApi::findId($f));
        return $model;
    }
    public static function insertPilots(array $pilots, Model $model): Model
    {
        if(!(is_null($pilots)))
            foreach($pilots as $p)
                $model->pilots()->attach(ValidateApi::findId($p));
        return $model;
    }
    public static function insertPlanets(array $planet, Model $model): Model
    {
        if(!(is_null($planet)))
            foreach($planet as $p)
                $model->planets()->attach(ValidateApi::findId($p));
        return $model;
    }
    public static function insertResidents(array $residents, Model $model): Model
    {
        if(!(is_null($residents)))
            foreach($residents as $r)
                $model->residents()->attach(ValidateApi::findId($r));
        return $model;
    }
    public static function insertSpecies(array $species, Model $model): Model
    {
        if(!(is_null($species)))
            foreach($species as $s)
                $model->species()->attach(ValidateApi::findId($s));
        return $model;
    }
    public static function insertStarships(array $starships, Model $model): Model
    {
        if(!(is_null($starships)))
            foreach($starships as $s)
                $model->starships()->attach(ValidateApi::findId($s));
        return $model;
    }
    public static function insertVehicles(array $vehicles, Model $model): Model
    {
        if(!(is_null($vehicles)))
            foreach($vehicles as $v)
                $model->vehicles()->attach(ValidateApi::findId($v));
        return $model;
    }
}
