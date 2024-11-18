<?php


use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

// if ($this->app->environment('production')) {
//     URL::forceRootUrl(Config::get('app.url'));
// }
request()->headers->set('Host', 'localhost');

return Application::configure(basePath: dirname(__DIR__))


    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'role' => \Spatie\Permission\Middleware\RoleMiddleware::class,
            'permission' => \Spatie\Permission\Middleware\PermissionMiddleware::class,
            'role_or_permission' => \Spatie\Permission\Middleware\RoleOrPermissionMiddleware::class,
        ]);
        request()->headers->set('Host', 'localhost');
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
        request()->headers->set('Host', 'localhost');
    })

    ->create();
