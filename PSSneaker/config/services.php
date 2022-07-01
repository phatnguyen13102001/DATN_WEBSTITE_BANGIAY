<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
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
    'facebook' => [
        'client_id' => '1619936111724930',
        'client_secret' => 'a2e7f758f17a112ff692aeefd8baf32d',
        'redirect' => 'http://localhost/callback/dangnhap',
    ],
    'google' => [
        'client_id'     => '53072127314-1hootag9t72e7pbob04tbueuuqpfga5j.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect'      => 'http://localhost:8000/google/callback',
    ],
];
