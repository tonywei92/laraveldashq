<?php

return [
    'middleware' => [],
    'uri' => env('DASHQ_URI', 'dashq'),
    'db' => [
        'connection' => env( 'DASHQ_DB_CONNECTION', config('database.default', 'mysql'))
    ]
];

