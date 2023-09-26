<?php

namespace Atin\LaravelMail\Listeners;

use Illuminate\Mail\Events\MessageSent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use function App\Listeners\env;

class LogSentMessage implements ShouldQueue
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
