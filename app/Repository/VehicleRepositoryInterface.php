<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Collection;
use stdClass;
use App\Models\Vehicle;

interface VehicleRepositoryInterface
{
    public function insert(stdClass $attributes): void;
    public function all();
    public function find(int $id): Vehicle;
    public function delete(int $id): void;
}
