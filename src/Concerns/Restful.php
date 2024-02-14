<?php

namespace Creative2\Umami\Concerns;

use Creative2\Umami\UmamiApi;

trait Restful
{
    public function all(array $data = []): ?array
    {
        return UmamiApi::get($this->getPath(), $this->getData($data, 'all'))->json();
    }

    public function get(string $id): ?array
    {
        return UmamiApi::get($this->getPath($id))->json();
    }

    public function create(array $data): ?array
    {
        return UmamiApi::post($this->getPath(), $this->getData($data, 'create'))->json();
    }

    public function update(string $id, array $data): ?array
    {
        return UmamiApi::post($this->getPath($id), $this->getData($data, 'update'))->json();
    }

    public function delete(string $id): bool
    {
        return UmamiApi::delete($this->getPath($id))->successful();
    }
}
