<?php

return [
    'account' => [
        'url' => env('UMAMI_URL', null),
        'username' => env('UMAMI_USERNAME', null),
        'password' => env('UMAMI_PASSWORD', null),
    ],
    'http' => [
        'verify' => env('UMAMI_HTTP_VERIFY', true),
        'exceptions' => env('UMAMI_HTTP_EXCEPTIONS', false),
        'user_agent' => env('UMAMI_HTTP_USER_AGENT', 'Mozilla/5.0 (Mobile)'),
    ],
];
