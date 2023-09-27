<?php

namespace Atin\LaravelUserable\Traits;

use Atin\LaravelMail\Models\MailLog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

trait HasMailLogs
{
    public function mail_logs()
    {
        return $this->hasMany(MailLog::class);
    }
}