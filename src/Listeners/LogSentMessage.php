<?php

namespace Atin\LaravelMail\Listeners;

use Atin\LaravelMail\Models\MailLog;
use Illuminate\Mail\Events\MessageSent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

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
    public function handle(MessageSent $event): void
    {
        if ($mailable = $event->message->getHeaders()->get('mailable')?->getValue()) {
            MailLog::create([
                'user_id' => \App\Models\User::where('email', '=', $event->message->getTo()[0]->getAddress())->first()->id,
                'mail_type' => $mailable,
            ]);
        }
    }
}
