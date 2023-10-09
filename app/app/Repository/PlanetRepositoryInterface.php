<?php

namespace App\Repository;

use stdClass;

interface PlanetRepositoryInterface
{
    public function insert(stdClass $attributes): void;
}
