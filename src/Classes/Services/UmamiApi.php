<?php

namespace Creative2\Umami\Classes\Services;

use Creative2\Umami\Contracts\ApiInterface;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class UmamiApi implements ApiInterface
{
    protected bool $throwHttpExceptions;

    protected string $url;

    protected string $username;

    protected string $password;

    protected string $authToken;

    protected array $headers = [];

    public function __construct() {
        $this->throwHttpExceptions = config('umami.http.exceptions');
        $this->url = $this->getConfig('account.url');
        $this->username = $this->getConfig('account.username');
        $this->password = $this->getConfig('account.password');
        $this->authToken = $this->getAuthToken();
    }

    protected function getConfig(string $key)
    {
        $configValue = config('umami.'.$key);

        abort_if(is_null($configValue), $key === 'account.url' ? 404 : 401, 'Umami not configured.');

        return $configValue;
    }

    protected function getAuthToken(): ?string
    {
        return $this->post('/auth/login', [
            'username' => $this->username,
            'password' => $this->password,
        ])->json('token');
    }

    public function userAgent(string $userAgent): UmamiApi
    {
        $this->headers['User-Agent'] = $userAgent;

        return $this;
    }

    public function resetHeaders(): void
    {
        $this->headers = [];
    }

    public function get(string $endpoint, array $data = []): Response
    {
        return $this->sendRequest('get', $endpoint, $data);
    }

    public function post(string $endpoint, array $data = []): Response
    {
        return $this->sendRequest('post', $endpoint, $data);
    }

    public function put(string $endpoint, array $data = []): Response
    {
        return $this->sendRequest('put', $endpoint, $data);
    }

    public function delete(string $endpoint): Response
    {
        return $this->sendRequest('delete', $endpoint, []);
    }

    protected function sendRequest(string $method, string $endpoint, array $data): Response
    {
        return (! empty($this->authToken) ? Http::withToken($this->authToken) : Http::getFacadeRoot())
            ->withHeaders($this->headers)
            ->{$method}($this->url.str($endpoint)->start('/'), $data)
            ->throwIf($this->throwHttpExceptions);
    }
}
