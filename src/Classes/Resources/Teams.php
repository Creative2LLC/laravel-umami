<?php

namespace Creative2\Umami\Classes\Resources;

use Creative2\Umami\Classes\Abstract\Resource;
use Creative2\Umami\Concerns\Restful;
use Creative2\Umami\Contracts\RestfulInterface;
use Creative2\Umami\UmamiApi;

class Teams extends Resource implements RestfulInterface
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
            ],
            'getUsers' => [
                'pageSize' => 100,
                'page' => 1,
                'orderBy' => 'name',
            ],
            // 'addUser' => [
            //     'userId' => null,
            //     'role' => null,
            // ],
            // 'updateUser' => [
            //     'role' => null,
            // ],
            'websites' => [
                'pageSize' => 100,
                'page' => 1,
                'orderBy' => 'name',
            ],
        ];
    }

    public function users(string $id, array $data = []): ?array
    {
        return UmamiApi::get($this->getPath($id, 'users'), $this->getData($data, 'getUsers'))->json();
    }

    // NOTE: currently broken in API

    // public function user(string $id, string $userId): ?array
    // {
    //     return UmamiApi::get($this->getPath($id, 'users', $userId))->json();
    // }

    // public function addUser(string $id, array $data = []): ?array
    // {
    //     return UmamiApi::post($this->getPath($id, 'users'), $this->getData($data, 'addUser'))->json();
    // }

    // public function updateUser(string $id, string $userId, array $data = []): ?array
    // {
    //     return UmamiApi::post($this->getPath($id, 'users', $userId), $this->getData($data, 'updateUser'))->json();
    // }

    public function removeUser(string $id, string $userId): bool
    {
        return UmamiApi::delete($this->getPath($id, 'users', $userId))->successful();
    }

    public function join(string $accessCode): ?array
    {
        return UmamiApi::post($this->getPath('join'), $this->getData([
            'accessCode' => $accessCode,
        ], 'join'))->json();
    }

    public function websites(string $id, array $data = []): ?array
    {
        return UmamiApi::get($this->getPath($id, 'websites'), $this->getData($data, 'websites'))->json();
    }
}
