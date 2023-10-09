<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Model;

interface BaseRepositoryInterface
{
    public static function insertCharacters(array $characters, Model $model): Model;
    public static function insertFilms(array $films, Model $model): Model;
    public static function insertPilots(array $pilots, Model $model): Model;
    public static function insertPlanets(array $planets, Model $model): Model;
    public static function insertResidents(array $residents, Model $model): Model;
    public static function insertSpecies(array $species, Model $model): Model;
    public static function insertStarships(array $starships, Model $model): Model;
    public static function insertVehicles(array $vehicles, Model $model): Model;
}
