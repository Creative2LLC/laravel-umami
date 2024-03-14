<?php

namespace Creative2\Umami\Classes\Resources;

use Creative2\Umami\Classes\Abstract\Resource;
use Creative2\Umami\UmamiApi;

class EventData extends Resource
{
    protected static function getDefaultData(): array
    {
        $data = [
            'startAt' => null,
            'endAt' => null,
        ];

        return [
            'events' => $data,
            'fields' => $data,
            'stats' => $data,
        ];
    }

    protected function getData(array $data, string $action, string $id = null): array
    {
        return [
            'websiteId' => $id,
            ...parent::getData($data, $action)
        ];
    }

    public function events(string $id, array $data): ?array
    {
        return UmamiApi::get($this->getPath('events'), $this->getData($data, 'events', $id))->json();
    }

    public function fields(string $id, array $data): ?array
    {
        return UmamiApi::get($this->getPath('fields'), $this->getData($data, 'fields', $id))->json();
    }

    public function stats(string $id, array $data): ?array
    {
        return UmamiApi::get($this->getPath('stats'), $this->getData($data, 'stats', $id))->json();
    }
}
