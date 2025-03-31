<?php

use App\Http\Middleware\CheckUserRoleMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // $middleware->append(CheckUserRoleMiddleware::class);
        // galima įdėti grupę
        // $middleware->appendToGroup('TestGroup', [CheckUserRoleMiddleware::class]);
        //api middleware taip pat ir web
        // $middleware->api(append: [CheckUserRoleMiddleware::class]);

        //Alias
        $middleware->alias(['gaidys' => CheckUserRoleMiddleware::class]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
