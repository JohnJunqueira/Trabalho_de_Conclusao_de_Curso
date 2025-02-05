<?php

use App\Http\Middleware\Admin;
use App\Http\Middleware\Prestador;
use App\Http\Middleware\Usercliente;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Auth;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'admin' => \App\Http\Middleware\Admin::class,
            'prestador' => \App\Http\Middleware\Prestador::class,
            'cliente' => \App\Http\Middleware\Cliente::class,
            'prestadorOrAdmin' => \App\Http\Middleware\PrestadorOrAdmin::class,
            'clienteOrAdmin' => \App\Http\Middleware\ClienteOrAdmin::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();



