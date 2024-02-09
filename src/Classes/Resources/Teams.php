<?php

namespace Creative2\Umami\Classes\Resources;

use Creative2\Umami\Classes\Abstract\Resource;
use Creative2\Umami\Concerns\Restful;
use Creative2\Umami\Contracts\RestfulInterface;
use Creative2\Umami\Facades\UmamiApi;

class Teams extends Resource implements RestfulInterface
{
    use Restful;

    protected static function getDefaultData(): array
    {
        return [
            'all' => [
                'pageSize' => 100,
                'page' => 1,
                'orderBy' => 'createdAt',
            ],
            'create' => [
                'name' => null,
            ],
            'users' => [
                'pageSize' => 100,
                'page' => 1,
            ],
        ];
    }

    public function users(string $id, array $data = []): ?array
    {
        return UmamiApi::get($this->getPath($id, 'users'), $this->getData($data, 'users'))->json();
    }

    public function addUser(string $id, array $data = []): ?array
    {
        // TODO: looks like only current user can add self?????
        return null;
    }
}
