<?php

use Illuminate\Http\Request;

function getEnvVariable($key, $default = null)
{
    // Lire le fichier .env
    $envPath = __DIR__ . '/../.env';
    if (!file_exists($envPath)) {
        return $default;
    }

    // Lire tout le contenu du fichier
    $envContent = file_get_contents($envPath);

    // Utiliser une expression régulière pour extraire la valeur de la variable
    if (preg_match('/^' . preg_quote($key, '/') . '=(.*)$/m', $envContent, $matches)) {
        return trim($matches[1]);
    }

    return $default;
}

if (getEnvVariable('APP_ENV') == "production") {
    $app_url = getEnvVariable("APP_URL");
    // $_SERVER['HTTP_HOST'] = $app_url;
    // $_SERVER['HOST'] = $app_url;
    // $_SERVER['Host'] = $app_url;
}

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
