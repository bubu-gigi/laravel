<?php

namespace App\Repository;

use Illuminate\Support\Collection;
use stdClass;

interface ResidentRepositoryInterface
{
    //public function all(): Collection;
    public function insert(stdClass $attributes): void;
    //public function attach(string $type, int $id): void;
}
