<?php

namespace Creative2\Umami\Classes\Resources;

use Creative2\Umami\Classes\Abstract\Resource;
use Creative2\Umami\Concerns\Restful;
use Creative2\Umami\Contracts\RestfulInterface;
use Creative2\Umami\Facades\UmamiApi;

class Users extends Resource implements RestfulInterface
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
                'username' => null,
                'password' => null,
                'role' => null,
            ],
            'websites' => [
                'pageSize' => 10,
                'page' => 1,
                'orderBy' => 'createdAt',
            ],
        ];
    }

    public function all(array $data = []): ?array
    {
        return UmamiApi::get('admin/users', $this->getData($data, 'all'))->json();
    }

    public function websites(string $id, array $data): ?array
    {
        return UmamiApi::get($this->getPath($id, 'websites'), $this->getData($data, 'websites'))->json();
    }
}
