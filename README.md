# Install
### Migrations
```php
php artisan vendor:publish --tag="laravel-mail-migrations"
```

then run ```php artisan migrate```

### Listeners
Register an event listener in *App\Providers\EventServiceProvider*:
```php
use Atin\LaravelMail\Listeners\LogSentMessage;
use Illuminate\Mail\Events\MessageSent;
 
/**
 * The event listener mappings for the application.
 *
 * @var array
 */
protected $listen = [
    MessageSent::class => [
        LogSentMessage::class,
    ],
];
```

### Generating Mailables
New "mailable" class will be stored in the *app/Mail* directory.
```php
php artisan make:mail OrderShipped
```

### Mailable class
Extend from ```Atin\LaravelMail\Mail\Mailable``` to log.
```php
use Atin\LaravelMail\Mail\Mailable;

class UserConfirmEmail extends Mailable
{
    public function build()
    {
         // Build email
    }
}
```

### Trait
Add ```HasMailLogs``` trait.
```php
use Atin\LaravelMail\Traits\HasMailLogs;

class User extends Authenticatable
{
    use HasMailLogs;
    …
}
```

### Migrations
```php
php artisan vendor:publish --tag="laravel-mail-migrations"
```