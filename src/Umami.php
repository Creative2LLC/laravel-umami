<?php

namespace Creative2\Umami;

use Creative2\Umami\Classes\Resources\Events;
use Creative2\Umami\Classes\Resources\Teams;
use Creative2\Umami\Classes\Resources\Users;
use Creative2\Umami\Classes\Resources\Websites;
use Creative2\Umami\Contracts\ResourceInterface;

class Umami
{
    public function events(): ResourceInterface
    {
        return app(Events::class);
    }

    public function teams(): ResourceInterface
    {
        return app(Teams::class);
    }

    public function users(): ResourceInterface
    {
        return app(Users::class);
    }

    public function websites(): ResourceInterface
    {
        return app(Websites::class);
    }
}
