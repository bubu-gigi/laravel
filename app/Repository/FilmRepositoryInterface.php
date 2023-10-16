<?php

namespace App\Repository;

use App\Models\Film;
use stdClass;

interface FilmRepositoryInterface
{
    public function insert(stdClass $attributes): void;
    public function all();
    public function find(int $id): Film;
    public function delete(int $id): void;
}
