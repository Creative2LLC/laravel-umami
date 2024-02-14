<?php

namespace Creative2\Umami;

use Creative2\Umami\Classes\Resources\EventData;
use Creative2\Umami\Classes\Resources\Reports;
use Creative2\Umami\Classes\Resources\Teams;
use Creative2\Umami\Classes\Resources\Users;
use Creative2\Umami\Classes\Resources\Websites;
use Illuminate\Support\ServiceProvider;

class UmamiServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->registerConfig();
        $this->registerSingletons();
    }

    protected function registerConfig()
    {
        $configPath = __DIR__.'/../config/umami.php';

        $this->mergeConfigFrom($configPath, 'umami');

        $this->publishes([
            $configPath => config_path('umami.php')
        ], 'creative2-umami-config');
    }

    protected function registerSingletons()
    {
        $this->app->singleton(EventData::class, function() {
            return new EventData();
        });

        $this->app->singleton(Reports::class, function() {
            return new Reports();
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
