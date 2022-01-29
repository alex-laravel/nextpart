<?php

return [
    'api' => [
        'url' => env('TEC_DOC_API_URL', ''),
        'key' => env('TEC_DOC_API_KEY', ''),
        'provider' => env('TEC_DOC_API_PROVIDER', 0),
        'language' => env('TEC_DOC_API_LANGUAGE', 'en'),
        'country' => env('TEC_DOC_API_COUNTRY', 'UA'),
    ],

    'asset' => [
        'url' => env('TEC_DOC_ASSET_URL', ''),
    ]
];
