<?php

namespace Creative2\Umami;

use Creative2\Umami\Classes\Resources\Events;
use Creative2\Umami\Classes\Resources\Teams;
use Creative2\Umami\Classes\Resources\Users;
use Creative2\Umami\Classes\Resources\Websites;
use Illuminate\Support\ServiceProvider;

class UmamiServiceProvider extends ServiceProvider
{
    private static $configPath = __DIR__.'/../config/umami.php';

    public function boot()
    {
        $this->mergeConfigFrom(self::$configPath, 'umami');

        $this->publishes([
            self::$configPath => config_path('umami.php')
        ], 'creative2-umami-config');

        $this->app->singleton(Events::class, function() {
            return new Events();
        });

        $this->app->singleton(Teams::class, function() {
            return new Teams();
        });

        $this->app->singleton(Users::class, function() {
            return new Users();
        });

        $this->app->singleton(Websites::class, function() {
            return new Websites();
        });
    }
}
