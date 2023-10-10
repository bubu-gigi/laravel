<?php

namespace App\Repository;

use stdClass;

interface StarshipRepositoryInterface
{
    public function insert(stdClass $attributes): void;
}
