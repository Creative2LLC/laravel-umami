<?php

namespace Creative2\Umami\Contracts;

use Illuminate\Http\Client\Response;

interface ApiInterface
{
    public function get(string $endpoint, array $data = []): Response;

    public function post(string $endpoint, array $data = []): Response;

    public function put(string $endpoint, array $data = []): Response;

    public function delete(string $endpoint): Response;
}
