<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Collection;
use stdClass;
use App\Models\Planet;

interface PlanetRepositoryInterface
{
    public function insert(stdClass $attributes): void;
    public function all(): Collection;
    public function find(int $id): Planet;
    public function delete(int $id): void;
}
