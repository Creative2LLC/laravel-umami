<?php

namespace Creative2\Umami;

use Creative2\Umami\Classes\Resources\EventData;
use Creative2\Umami\Classes\Resources\Reports;
use Creative2\Umami\Classes\Resources\Teams;
use Creative2\Umami\Classes\Resources\Users;
use Creative2\Umami\Classes\Resources\Websites;

class Umami
{
    public function eventData(): EventData
    {
        return app(EventData::class);
    }

    public function teams(): Teams
    {
        return app(Teams::class);
    }

    // public function reports(): Reports
    // {
    //     return app(Reports::class);
    // }

    public function users(): Users
    {
        return app(Users::class);
    }

    public function websites(): Websites
    {
        return app(Websites::class);
    }
}
