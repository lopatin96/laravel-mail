<?php

namespace Atin\LaravelMail\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'mail_type',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
