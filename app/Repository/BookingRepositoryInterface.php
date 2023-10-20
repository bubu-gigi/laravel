<?php

namespace App\Repository;

use App\Models\User;
use stdClass;

interface BookingRepositoryInterface
{
    public function insert(stdClass $attributes): void;
    public function all();
    public function makeBooking(User $user, int $filmId): string;
}
