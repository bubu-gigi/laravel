<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Collection;
use stdClass;
use App\Models\Starship;

interface StarshipRepositoryInterface
{
    public function insert(stdClass $attributes): void;
    public function all();
    public function find(int $id): Starship;
    public function delete(int $id): void;
}
