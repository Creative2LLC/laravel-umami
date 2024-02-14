<?php

namespace Creative2\Umami;

use Illuminate\Support\Facades\Facade;

class UmamiApi extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Creative2\Umami\Classes\Services\UmamiApi::class;
    }
}
