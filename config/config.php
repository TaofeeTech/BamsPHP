<?php

return [

    // Database Configuration
    'database' => [
        'host' => 'localhost',
        'username' => 'root',
        'password' => '',
        'database' => 'my_database',
        'port' => 3306,
        'charset' => 'utf8mb4'
    ],

    // Environment Configuration
    'environment' => true,

    // Error Reporting Configuration
    'log' => [
        'path' => 'logs/app.log',
        'level' => 'info',
        'warning' => 'error'
    ],

    // Session Configuration
    'session' => [
        'name' => 'my_session'
    ]

];