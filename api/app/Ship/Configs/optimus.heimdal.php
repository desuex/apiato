<?php

use Symfony\Component\HttpKernel\Exception as SymfonyException;

return [
    'add_cors_headers' => false,

    // Has to be in prioritized order, e.g. highest priority first.
    'formatters' => [
        Exception::class => \App\Ship\Exceptions\Formatters\ExceptionFormatter::class,
    ],

    'response_factory' => \Optimus\Heimdal\ResponseFactory::class,

    'reporters' => [

    ],

    'server_error_production' => 'An error occurred.'
];
