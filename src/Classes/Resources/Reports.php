<?php

namespace Creative2\Umami\Classes\Resources;

use Creative2\Umami\Classes\Abstract\Resource;
use Creative2\Umami\UmamiApi;

class Reports extends Resource
{
    // TODO: check if restful

    // TODO: check filters
    public function all(array $data = []): ?array
    {
        return UmamiApi::get($this->getPath(), $this->getData($data, 'all'))->json();
    }

    public function get(string $id): ?array
    {
        return UmamiApi::get($this->getPath($id))->json();
    }

    // TODO:
    // funnel
    // insights
    // retention
}
