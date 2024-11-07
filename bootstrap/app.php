<?php

use Illuminate\Foundation\Application;
use App\Http\Middleware\AdminMiddleware; // from withMiddleware method
use App\Http\Middleware\UserMiddleware; // from withMiddleware method
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // first way ; longer
        // $middleware->append(AdminMiddleware::class);
        // $middleware->append(UserMiddleware::class);

        // second way with alias ; shorter
        $middleware->alias([
            'admin' => AdminMiddleware::class ,
            'user' => UserMiddleware::class ,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
