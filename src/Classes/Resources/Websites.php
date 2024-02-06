<?php

namespace Creative2\Umami\Classes\Resources;

use Creative2\Umami\Classes\Abstract\BaseResource;
use Creative2\Umami\Facades\UmamiApi;

class Websites extends BaseResource
{
    public function reset(string $id): bool
    {
        return UmamiApi::post($this->getPath($id, 'reset'))->successful();
    }

    public function active(string $id): ?array
    {
        return UmamiApi::get($this->getPath($id, 'active'))->json();
    }

    public function events(string $id, array $data): ?array
    {
        return UmamiApi::get($this->getPath($id, 'events'), $data)->json();
    }

    public function pagevViews(string $id, array $data): ?array
    {
        return UmamiApi::get($this->getPath($id, 'pageviews'), $data)->json();
    }

    public function metrics(string $id, array $data): ?array
    {
        return UmamiApi::get($this->getPath($id, 'metrics'), $data)->json();
    }

    public function stats(string $id, array $data): ?array
    {
        return UmamiApi::get($this->getPath($id, 'stats'), $data)->json();
    }
}
