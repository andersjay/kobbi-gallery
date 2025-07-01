<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Log;
use Swift_TransportException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // Log SMTP and mail-related exceptions
        $exceptions->reportable(function (Throwable $e) {
            if ($e instanceof \Symfony\Component\Mailer\Exception\TransportException ||
                $e instanceof \Swift_TransportException ||
                str_contains($e->getMessage(), 'mail') ||
                str_contains($e->getMessage(), 'smtp') ||
                str_contains(get_class($e), 'Mail')) {
                
                Log::error('SMTP: Email delivery failed', [
                    'exception_type' => get_class($e),
                    'error_message' => $e->getMessage(),
                    'file' => $e->getFile(),
                    'line' => $e->getLine(),
                    'smtp_config' => [
                        'host' => config('mail.mailers.smtp.host'),
                        'port' => config('mail.mailers.smtp.port'),
                        'username' => config('mail.mailers.smtp.username') ? 'configured' : 'not_configured',
                        'encryption' => config('mail.mailers.smtp.encryption')
                    ],
                    'trace' => $e->getTraceAsString()
                ]);
            }
        });
    })->create();
