<?php

namespace Creative2\Umami;

use Creative2\Umami\Classes\Resources\Event;
use Creative2\Umami\Classes\Resources\EventData;
use Creative2\Umami\Classes\Resources\Teams;
use Creative2\Umami\Classes\Resources\Users;
use Creative2\Umami\Classes\Resources\Websites;
use Illuminate\Support\ServiceProvider;

class UmamiServiceProvider extends ServiceProvider
{
    public array $singletons = [
        Event::class,
        EventData::class,
        Teams::class,
        Users::class,
        Websites::class,
    ];

    public function register()
    {
        $configPath = __DIR__.'/../config/umami.php';

        $this->mergeConfigFrom($configPath, 'umami');

        $this->publishes([
            $configPath => config_path('umami.php')
        ], 'creative2-umami-config');
    }
}
