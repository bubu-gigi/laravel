<?php

namespace App\Repository\Eloquent;

use App\Helpers\ApiHelper;
use App\Models\Booking;
use App\Models\Film;
use App\Models\User;
use App\Repository\BookingRepositoryInterface;
use stdClass;

class BookingRepository extends BaseRepository implements BookingRepositoryInterface
{
    protected $model;
    public function __construct(Booking $model)
    {
       $this->model = $model;
    }

    public function makeBooking(User $user, int $idFilm): string
    {
        $film = Film::where('remote_id', $idFilm)->first();
        $tickets = $film->tickets;
        if($tickets == 0)
            return "Mi dispiace i biglietti per questo film sono esauriti.";
        else
        {
            $film->tickets = --$tickets;
            $film->save();
            return "Operazione completata. Ti auguriamo una buona visione: " . $user->name . PHP_EOL;
        }
    }
    public function insert(stdClass $attributes): void
    {
        $this->model = new Booking();
    }
    public function all()
    {
        return $this->model::all();
    }
}
