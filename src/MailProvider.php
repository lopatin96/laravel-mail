<?php

namespace Atin\LaravelMail;

use Illuminate\Support\ServiceProvider;

class MailProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'laravel-mail');

        $this->publishes([
            __DIR__.'/../database/migrations' => database_path('/migrations')
        ], 'laravel-mail-migrations');

        $this->publishes([
            __DIR__.'/../config/config.php' => config_path('laravel-mail.php')
        ], 'laravel-mail-config');
    }
}