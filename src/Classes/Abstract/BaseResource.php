<?php

namespace Creative2\Umami\Classes\Abstract;

use Creative2\Umami\Contracts\ResourceInterface;
use Creative2\Umami\Facades\UmamiApi;

abstract class BaseResource implements ResourceInterface
{
    private string $resource;

    public function __construct()
    {
        $this->resource = strtolower(class_basename(static::class));
    }

    public function getPath(mixed ...$params): string
    {
        if (! empty($params)) {
            return $this->resource.'/'.implode('/', $params);
        }

        return $this->resource;
    }

    public function all(array $data = []): ?array
    {
        return UmamiApi::get($this->getPath(), $data)->json();
    }

    public function get(string $id): ?array
    {
        return UmamiApi::get($this->getPath($id))->json();
    }

    public function create(array $data): ?array
    {
        return UmamiApi::post($this->getPath(), $data)->json();
    }

    public function update(string $id, array $data): ?array
    {
        return UmamiApi::post($this->getPath($id), $data)->json();
    }

    public function delete(string $id): bool
    {
        return UmamiApi::delete($this->getPath($id))->successful();
    }
}
