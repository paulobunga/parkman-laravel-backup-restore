<?php

/*
 * You can place your custom package configuration in here.
 */
return [
    'backup' => [
        'source' => [
            'databases' => [
                'mysql',
            ],
            'files' => [
                'include' => [
                    base_path(),
                ],
                'exclude' => [
                    base_path('vendor'),
                    base_path('node_modules'),
                ],
            ],
        ],
        'destination' => [
            'disk' => 'google',
        ],
    ],
    'google' => [
        'client_id' => env('GOOGLE_DRIVE_CLIENT_ID'),
        'client_secret' => env('GOOGLE_DRIVE_CLIENT_SECRET'),
        'refresh_token' => env('GOOGLE_DRIVE_REFRESH_TOKEN'),
        'folder_id' => env('GOOGLE_DRIVE_FOLDER_ID'),
    ],
];