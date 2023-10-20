<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendBookingConfirmationEmail
{
    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        $booking = $event->booking;
    }
}
