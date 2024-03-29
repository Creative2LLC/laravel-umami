<?php

namespace Creative2\Umami\Classes\Resources;

use Creative2\Umami\Classes\Abstract\Resource;
use Creative2\Umami\Concerns\Restful;
use Creative2\Umami\Contracts\RestfulInterface;
use Creative2\Umami\UmamiApi;

class Websites extends Resource implements RestfulInterface
{
    use Restful;

    protected static function getDefaultData(): array
    {
        return [
            'all' => [
                'pageSize' => 100,
                'page' => 1,
                'orderBy' => 'name',
            ],
            'create' => [
                'name' => null,
                'domain' => null,
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
        return UmamiApi::get($this->getPath($id, 'active'))->json()['x'] ?? null;
    }

    public function events(string $id, array $data): ?array
    {
        return UmamiApi::get($this->getPath($id, 'events'), $this->getData($data, 'events'))->json();
    }

    public function pageViews(string $id, array $data): ?array
    {
        return UmamiApi::get($this->getPath($id, 'pageviews'), $this->getData($data, 'pageviews'))->json();
    }

    public function metrics(string $id, array $data): ?array
    {
        return UmamiApi::get($this->getPath($id, 'metrics'), $this->getData($data, 'metrics'))->json();
    }

    public function stats(string $id, array $data): ?array
    {
        return UmamiApi::get($this->getPath($id, 'stats'), $this->getData($data, 'stats'))->json();
    }
}
