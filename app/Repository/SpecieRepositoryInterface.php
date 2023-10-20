<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Collection;
use stdClass;
use App\Models\Specie;

interface SpecieRepositoryInterface
{
    public function insert(stdClass $attributes): void;
    public function all();
    public function find(int $id): Specie;
    public function delete(int $id): void;
}
