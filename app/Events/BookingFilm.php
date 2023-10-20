<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class BookingFilm
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $booking;
    public function __construct(Booking $booking)
    {
        $this->booking = $booking;
    }

    

}
