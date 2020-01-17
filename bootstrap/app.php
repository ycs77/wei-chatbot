<?php

require_once __DIR__ . '/../vendor/autoload.php';

// Load .env variables
$dotenv = \Dotenv\Dotenv::createImmutable(realpath(__DIR__ . '/..'));
$dotenv->load();

if (env('APP_DEBUG') !== 'true') {
    set_error_handler(function () {
        echo json_encode([
            'code' => 500,
            'message' => 'Server Error',
        ]);

        die();
    });

    set_exception_handler(function (Throwable $e) {
        echo json_encode([
            'code' => $e->getCode(),
            'message' => env('APP_DEBUG') === 'true' ? $e->getMessage() : 'Request Error',
        ]);

        die();
    });
}
