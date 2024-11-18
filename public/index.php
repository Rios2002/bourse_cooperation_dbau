<?php

use Illuminate\Http\Request;

$_SERVER['HTTP_HOST'] = env('APP_URL');
$_SERVER['HOST'] = env('APP_URL');
$_SERVER['Host'] = env('APP_URL');
define('LARAVEL_START', microtime(true));

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__ . '/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
require __DIR__ . '/../vendor/autoload.php';

// Bootstrap Laravel and handle the request...
(require_once __DIR__ . '/../bootstrap/app.php')
    ->handleRequest(Request::capture());
