<?php

namespace App\Repository;

use stdClass;

interface VehicleRepositoryInterface
{
    public function insert(stdClass $attributes): void;
}
