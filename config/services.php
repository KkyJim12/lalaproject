<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => env('SES_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'google' => [
        'client_id' => '330857847010-j3q0mn7ksis1ck3uc5scuf51ci2cpf9e.apps.googleusercontent.com',
        'client_secret' => '95kQ-BJ2GOI2_wbjFmAjF6xi',
        'redirect' => 'http://www.bestskill.co',
    ],

    'facebook' => [
    'client_id' => '2198403540443452',
    'client_secret' => '76e7439956a22ff613da6ac541c13cd2',
    'redirect' => 'http://bestskill.co/facebook/callback',
    ],
];
