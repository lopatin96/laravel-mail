<?php

namespace Atin\LaravelMail\Mail;

use Illuminate\Mail\Mailable as BaseMailable;

abstract class Mailable extends BaseMailable
{
    public function send(\Illuminate\Contracts\Mail\Factory|\Illuminate\Contracts\Mail\Mailer $mailer)
    {
        $this->withSymfonyMessage(function ($message) {
            $message->mailable = get_class($this);
        });

        parent::send($mailer);
    }
}
