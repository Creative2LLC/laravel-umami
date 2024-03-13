<?php

namespace Creative2\Umami\Classes\Resources;

use Creative2\Umami\Classes\Abstract\Resource;
use Creative2\Umami\UmamiApi;

class Event extends Resource
{
    protected static function getDefaultData(): array
    {
        return [
            'send' => [
                'hostname' => parse_url(url(''), PHP_URL_HOST),
                'language' => app()->getLocale(),
                'website' => null,
                'name' => null,
            ],
        ];
    }

    public function send(array $data): ?array
    {
        $response = UmamiApi::userAgent(config('umami.http.user_agent'))->post('send', [
            'type' => 'event',
            'payload' => $this->getData($data, 'send'),
        ]);

        UmamiApi::userAgent();

        return $response->json();
    }
}
