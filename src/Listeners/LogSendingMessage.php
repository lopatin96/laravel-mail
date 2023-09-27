<?php

namespace Atin\LaravelMail\Listeners;

use Atin\LaravelMail\Models\MailLog;
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
        dd($event->message->getHeaders());
        MailLog::create([
            'user_id' => \App\Models\User::where('email', '=', $event->message->getTo()[0]->getAddress())->first()->id,
            'mail_type' => $event->message->mailable,
            'status' => \Atin\LaravelMail\Enums\MailStatus::Sending,
        ]);
    }
}
