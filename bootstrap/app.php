<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
          'admin' => \App\Http\Middleware\AdminMiddleware::class,
          'timezone' => \App\Http\Middleware\SetTimezone::class,
          'track.user' => \App\Http\Middleware\TrackUserStatus::class,
          'log.activity' => \App\Http\Middleware\LogUserActivity::class,
          'log.error' => \App\Http\Middleware\LogApplicationError::class,
          'check.menu.access' => \App\Http\Middleware\CheckMenuAccess::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {

    })->create();
