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
        'client_id' => '23258567926-qu3ltkh0kqhkse8ilidn3taqv4hs5aea.apps.googleusercontent.com',
        'client_secret' => 'GMd646QtXZGLmYW4q515jD_d',
        'redirect' => 'http://localhost:8000/account/login/google_callback'
    ],

    'facebook' => [
        'client_id' => '258678074820779',
        'client_secret' => 'fc57106b5a775747d15dff08e267d30b',
        'redirect' => 'http://localhost:8000/account/login/google_callback',
    ],

];
