<?php

namespace Atin\LaravelMail\Listeners;

use Illuminate\Mail\Events\MessageSending;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogSendingMessage implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(MessageSending $event): void
    {
        $event->user->update([
            'city' => $event->user->latitude && $event->user->longitude
                ? $this->getCityNameByLatitudeLongitude($event->user->latitude, $event->user->longitude)
                : null,
        ]);
    }
}
