<?php

use Knuckles\Scribe\Extracting\Strategies;
use Knuckles\Scribe\Config\Defaults;
use Knuckles\Scribe\Config\AuthIn;
use function Knuckles\Scribe\Config\{removeStrategies, configureStrategy};

return [
    // Osnovne postavke dokumentacije
    'title' => 'Moja API Dokumentacija',
    'description' => 'Dokumentacija za moj API',
    'base_url' => env('APP_URL', 'http://localhost'),
    'version' => '1.0.0',

    // Konfiguracija ruta
    'routes' => [
        [
            'match' => [
                'domains' => ['*'],
                'prefixes' => ['api/*'],
                'versions' => ['v1'],
            ],
            'include' => [],
            'exclude' => [],
        ],
    ],

    // Postavke izgleda dokumentacije
    'type' => 'laravel',
    'theme' => 'default',

    // Static docs settings
    'static' => [
        'output_path' => 'public/docs',
    ],

    // Laravel docs settings
    'laravel' => [
        'add_routes' => true,
        'docs_url' => '/docs',
        'assets_directory' => null,
        'middleware' => [],
    ],

    // Postavke za testiranje API-ja
    'try_it_out' => [
        'enabled' => true,
        'base_url' => null,
        'use_csrf' => true, // Omogućeno za Laravel Sanctum
        'csrf_url' => '/sanctum/csrf-cookie',
    ],

    // Autentifikacija
    'auth' => [
        'enabled' => true,
        'default' => true,
        'in' => AuthIn::BEARER->value,
        'name' => 'Authorization',
        'use_value' => env('SCRIBE_AUTH_KEY'),
        'placeholder' => '{YOUR_AUTH_TOKEN}',
        'extra_info' => 'Token možete dobiti na /api/auth/login',
    ],

    // Uvodni tekst
    'intro_text' => <<<INTRO
Ova dokumentacija opisuje sve dostupne endpointove našeg API-ja.

<aside>Kako scrollate, vidjet ćete primjere koda za rad s API-jem u različitim programskim jezicima.</aside>
INTRO,

    // Primjeri koda
    'example_languages' => [
        'bash',
        'javascript',
    ],

    // Postman kolekcija
    'postman' => [
        'enabled' => true,
        'overrides' => [],
    ],

    // OpenAPI specifikacija
    'openapi' => [
        'enabled' => true,
        'overrides' => [],
        'generators' => [],
    ],

    // Grupe endpointova
    'groups' => [
        'default' => 'Osnovni endpointovi',
        'order' => [],
    ],

    // Logo
    'logo' => false,

    // Zadnje ažurirano
    'last_updated' => 'Zadnje ažurirano: {date:d.m.Y}',

    // Primjeri podataka
    'examples' => [
        'faker_seed' => 1234,
        'models_source' => ['factoryCreate', 'factoryMake', 'databaseFirst'],
    ],

    // Strategije ekstrakcije
    'strategies' => [
        'metadata' => [
            ...Defaults::METADATA_STRATEGIES,
        ],
        'headers' => [
            ...Defaults::HEADERS_STRATEGIES,
            Strategies\StaticData::withSettings(data: [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ]),
        ],
        'urlParameters' => [
            ...Defaults::URL_PARAMETERS_STRATEGIES,
        ],
        'queryParameters' => [
            ...Defaults::QUERY_PARAMETERS_STRATEGIES,
        ],
        'bodyParameters' => [
            ...Defaults::BODY_PARAMETERS_STRATEGIES,
        ],
        'responses' => configureStrategy(
            Defaults::RESPONSES_STRATEGIES,
            Strategies\Responses\ResponseCalls::withSettings(
                only: ['GET *'],
                config: [
                    'app.debug' => false,
                ]
            )
        ),
        'responseFields' => [
            ...Defaults::RESPONSE_FIELDS_STRATEGIES,
        ]
    ],

    // Transakcije baze podataka
    'database_connections_to_transact' => [config('database.default')],

    // Fractal postavke
    'fractal' => [
        'serializer' => null,
    ],
];