<?php

return [

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'openweather' => [
        'key' => env('WEATHER_APP_ID'),
        'lat' => '41.6322',
        'long' => '-88.2120',
    ],

];
