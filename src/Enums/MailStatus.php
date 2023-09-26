<?php

namespace Atin\LaravelMail\Enums;

enum MailStatus: string
{
    case Sending = 'sending';
    case Sent = 'sent';
}
