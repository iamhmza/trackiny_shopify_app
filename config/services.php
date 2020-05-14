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

    'shopify' => [
        'client_id' => env('SHOPIFY_KEY'),
        'client_secret' => env('SHOPIFY_SECRET'),
        'redirect' => env('SHOPIFY_REDIRECT_URI'),
    ],

    'freshdesk' => [
        'url' => env('FRESHDESK_URL', 'https://shaham902.freshdesk.com/api/v2/tickets'),
        'token' => env('FRESHDESK_TOKEN', 'ZvYiNAYCpegtads9OUmc'),
        'email' => env('FRESHDESK_CC_EMAIL', 'shaham902@gmail.com'),
    ],

];
