<?php

return [
    'generators' => [
        'form' => 'Pharam\Generator\FormGenerator'
    ],
    'paths' => [
        'form' => 'forms/'
    ],
    'database' => [
        'dbname' => null,
        'user' => null,
        'password' => null,
        'host' => null,
        'driver' => null,
    ],
    'tidy' => [
        'indent' => true,
        'output-xhtml' => true,
        'wrap' => 200
    ]
];
