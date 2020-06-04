<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, SparkPost and others. This file provides a sane default
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'facebook' => [
         'client_id' => '4207322919293824',
         'client_secret' => '8b811b1404d66fb64383057b7159320a',
         'redirect' => 'https://vegefoods.com/callback/facebook',
    ],

    'github' => [
        'client_id' => '61f3e262a11a990a126d',
        'client_secret' => '6f343221297766bb30b8ea718a9cd64943bb7037',
        'redirect' => 'http://vegefoods.com/callback/github',
    ], 

    'google' => [

        'client_id' => '376604151469-n9vgj51etfebeie936m0aj8ko8rub4ds.apps.googleusercontent.com',

        'client_secret' => 'xLLb3MEcpg1rEyuG_h8GJYeh',

        'redirect' => 'http://vegefoods.com/auth/google/callback',

    ],
];
