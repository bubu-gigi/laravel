<?php

namespace App\Repository;

use stdClass;

interface SpecieRepositoryInterface
{
    public function insert(stdClass $attributes): void;
}
