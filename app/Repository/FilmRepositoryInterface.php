<?php

namespace App\Repository;

use Illuminate\Support\Collection;
use stdClass;

interface FilmRepositoryInterface
{
    public function all(): Collection;
    public function insert(stdClass $attributes): void;
}
