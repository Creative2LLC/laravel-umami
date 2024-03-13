<?php

namespace Creative2\Umami\Classes\Services;

use Creative2\Umami\Classes\Abstract\Resource;
use Creative2\Umami\Classes\Resources\Event;
use Creative2\Umami\Classes\Resources\EventData;
use Creative2\Umami\Classes\Resources\Teams;
use Creative2\Umami\Classes\Resources\Users;
use Creative2\Umami\Classes\Resources\Websites;

class Umami
{
    public function event(): Resource
    {
        return app(Event::class);
    }

    public function eventData(): Resource
    {
        return app(EventData::class);
    }

    public function teams(): Resource
    {
        return app(Teams::class);
    }

    public function users(): Resource
    {
        return app(Users::class);
    }

    public function websites(): Resource
    {
        return app(Websites::class);
    }
}
