<?php

return [
    'account' => [
        'url' => env('UMAMI_URL', null),
        'username' => env('UMAMI_USERNAME', null),
        'password' => env('UMAMI_PASSWORD', null),
    ],
    'http' => [
        'exceptions' => env('UMAMI_HTTP_EXCEPTIONS', false),
    ],
];
