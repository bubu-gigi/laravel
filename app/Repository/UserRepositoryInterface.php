<?php

namespace App\Repository;

use stdClass;
use App\Models\User;
use Illuminate\Support\Collection;

interface UserRepositoryInterface
{
    public function insert(stdClass $attributes): void;
    public function all(): Collection;
    public function find(int $id): User;
    public function delete(int $id): void;
}
