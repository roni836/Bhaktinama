<?php

return [
   

   'guards' => [
    'web' => [
        'driver' => 'session',
        'provider' => 'users',
    ],

    'api' => [
        'driver' => 'token',
        'provider' => 'users',
        'hash' => false,
    ],
],


    'providers'        => [
        'users' => [
            'driver' => 'eloquent',
            'model'  => env('AUTH_MODEL', App\Models\User::class),
        ],

        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    ],

    'passwords'        => [
        'users' => [
            'provider' => 'users',
            'table'    => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'),
            'expire'   => 60,
            'throttle' => 60,
        ],

        // 'admins' => [
        //     'provider' => 'admins',
        //     'table' => 'password_reset_tokens',
        //     'expire' => 60,
        //     'throttle' => 60,
        // ],
    ],

    'password_timeout' => env('AUTH_PASSWORD_TIMEOUT', 10800),
];
