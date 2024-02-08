<?php

namespace Creative2\Umami\Classes\Resources;

use Creative2\Umami\Classes\Abstract\Resource;
use Creative2\Umami\Concerns\Restful;
use Creative2\Umami\Contracts\RestfulInterface;
use Creative2\Umami\Facades\UmamiApi;

class Teams extends Resource implements RestfulInterface
{
    use Restful;
}
