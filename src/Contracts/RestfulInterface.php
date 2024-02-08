<?php

namespace Creative2\Umami\Contracts;

interface RestfulInterface
{
    public function all(array $data = []): ?array;

    public function get(string $id): ?array;

    public function create(array $data): ?array;

    public function update(string $id, array $data): ?array;

    public function delete(string $id): bool;
}
