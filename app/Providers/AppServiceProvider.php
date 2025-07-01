<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Mail\Events\MessageSending;
use Illuminate\Mail\Events\MessageSent;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Log;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Log SMTP connection and email sending events
        Event::listen(MessageSending::class, function (MessageSending $event) {
            $message = $event->message;
            $recipients = [];
            
            if ($message->getTo()) {
                foreach ($message->getTo() as $address) {
                    $recipients[] = $address->getAddress();
                }
            }

            $from = [];
            if ($message->getFrom()) {
                foreach ($message->getFrom() as $address) {
                    $from[] = $address->getAddress();
                }
            }

            Log::info('SMTP: Email sending started', [
                'subject' => $message->getSubject(),
                'to' => $recipients,
                'from' => $from,
                'smtp_host' => config('mail.mailers.smtp.host'),
                'smtp_port' => config('mail.mailers.smtp.port'),
                'smtp_username' => config('mail.mailers.smtp.username') ? 'configured' : 'not_configured'
            ]);
        });

        Event::listen(MessageSent::class, function (MessageSent $event) {
            $message = $event->message;
            $recipients = [];
            
            if ($message->getTo()) {
                foreach ($message->getTo() as $address) {
                    $recipients[] = $address->getAddress();
                }
            }

            $from = [];
            if ($message->getFrom()) {
                foreach ($message->getFrom() as $address) {
                    $from[] = $address->getAddress();
                }
            }

            Log::info('SMTP: Email sent successfully', [
                'subject' => $message->getSubject(),
                'to' => $recipients,
                'from' => $from,
                'timestamp' => now()->toISOString()
            ]);
        });
    }
}
