<?php

namespace Creative2\Umami\Classes\Resources;

use Creative2\Umami\Classes\Abstract\Resource;
use Creative2\Umami\Facades\UmamiApi;

class Websites extends Resource
{
    protected static function getDefaultData(): array
    {
        return [
            'all' => [
                'pageSize' => 10,
                'page' => 1,
                'orderBy' => 'createdAt',
            ],
            'create' => [
                'name' => null,
                'domain' => null,
            ],
            'update' => [
                //
            ],
            'events' => [
                'startAt' => null,
                'endAt' => null,
                'unit' => 'day',
                'timezone' => config('app.timezone'),
            ],
            'pageviews' => [
                'startAt' => null,
                'endAt' => null,
                'unit' => 'day',
                'timezone' => config('app.timezone'),
            ],
            'metrics' => [
                'startAt' => null,
                'endAt' => null,
                'timezone' => config('app.timezone'),
                'type' => 'url',
            ],
            'stats' => [
                'startAt' => null,
                'endAt' => null,
                'timezone' => config('app.timezone'),
            ],
        ];
    }

    public function reset(string $id): bool
    {
        return UmamiApi::post($this->getPath($id, 'reset'))->successful();
    }

    public function active(string $id): ?int
    {
        return UmamiApi::get($this->getPath($id, 'active'))->json(0)['x'] ?? null;
    }

    public function events(string $id, array $data): ?array
    {
        return UmamiApi::get($this->getPath($id, 'events'), $this->getData('events', $data))->json();
    }

    public function pagevViews(string $id, array $data): ?array
    {
        return UmamiApi::get($this->getPath($id, 'pageviews'), $this->getData('pageviews', $data))->json();
    }

    public function metrics(string $id, array $data): ?array
    {
        return UmamiApi::get($this->getPath($id, 'metrics'), $this->getData('metrics', $data))->json();
    }

    public function stats(string $id, array $data): ?array
    {
        return UmamiApi::get($this->getPath($id, 'stats'), $this->getData('stats', $data))->json();
    }
}
