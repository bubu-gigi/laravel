<?php

namespace App\Repository;

use stdClass;

interface FilmRepositoryInterface
{
    public function insert(stdClass $attributes): void;
}
