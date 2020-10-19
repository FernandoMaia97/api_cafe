<?php

use App\Initialize\Bootstrap;

require __DIR__ . '/../vendor/autoload.php';

/**
 * Initializing .env
 */
$dotenv = Dotenv\Dotenv::createImmutable(
    __DIR__ . DIRECTORY_SEPARATOR . '..'
);
$dotenv->load();

if ($_SERVER['APPENV'] == 'local') {
    error_reporting(E_ALL);
} else {
    error_reporting(0);
}

$bootstrap = new Bootstrap();
$bootstrap->boot();
