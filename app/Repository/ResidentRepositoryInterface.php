<?php

namespace App\Repository;

use stdClass;

interface ResidentRepositoryInterface
{
    public function insert(stdClass $attributes): void;
}
