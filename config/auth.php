<?php

return [
    'defaults' => [
        'guard' => env('AUTH_GUARD', 'web'), // Zadani guard (web za web sučelje)
        'passwords' => env('AUTH_PASSWORD_BROKER', 'users'), // Reset lozinke
    ],

    'guards' => [
        'web' => [
            'driver' => 'session', // Za web koristimo session
            'provider' => 'users', // Koristi 'users' provider
        ],
        
        'api' => [
            'driver' => 'sanctum',  // Promijenjeno sa 'session' na 'sanctum'
            'provider' => 'users',  // Koristi 'users' provider
            'hash' => false,        // Opcionalno - ne hashira token
        ],
    ],

    'providers' => [
        'users' => [
            'driver' => 'eloquent', // Koristi Eloquent model
            'model' => env('AUTH_MODEL', App\Models\User::class), // Model User
        ],
    ],

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'),
            'expire' => 60, // Token ističe za 60 minuta
            'throttle' => 60, // Čekaj 60 sekundi prije novog zahtjeva
        ],
    ],

    'password_timeout' => env('AUTH_PASSWORD_TIMEOUT', 10800), // Timeout za potvrdu lozinke
];