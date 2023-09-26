# Install
### Migrations
```php
php artisan vendor:publish --tag="laravel-mail-migrations"
```

then run ```php artisan migrate```

### Config
Publish config to manage active mails:
```php
php artisan vendor:publish --tag="laravel-mail-config"
```

### Listeners
Register two event listeners in *App\Providers\EventServiceProvider*:
```php
use Atin\LaravelMail\Listeners\LogSendingMessage;
use Atin\LaravelMail\Listeners\LogSentMessage;
use Illuminate\Mail\Events\MessageSending;
use Illuminate\Mail\Events\MessageSent;
 
/**
 * The event listener mappings for the application.
 *
 * @var array
 */
protected $listen = [
    MessageSending::class => [
        LogSendingMessage::class,
    ],
 
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
Extend from ```\Atin\LaravelMail\Mail\Mailable``` to log.
```php
class UserConfirmEmail extends \Atin\LaravelMail\Mail\Mailable
{
    public function build()
    {
         // Build email
    }
}
```

# Publishing
### Config
```php
php artisan vendor:publish --tag="laravel-mail-config"
```

### Migrations
```php
php artisan vendor:publish --tag="laravel-mail-migrations"
```