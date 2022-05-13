<?php

namespace App\Providers;

use Monolog\Handler\ErrorLogHandler;
use Monolog\Handler\NullHandler;
use Monolog\Logger;
use Psr\Log\LoggerInterface;
use Restolia\Foundation\Environment;
use Restolia\Foundation\Provider;

class LoggerProvider extends Provider
{
    public function __construct(private Environment $environment)
    {
        // The constructor can type hint dependencies, so you can
        // use other container bound classes here.
    }

    public function register(): void
    {
        $this->bind(
            LoggerInterface::class,
            new Logger(
                'logger',
                [$this->environment->is('local', 'testing') ? new NullHandler() : new ErrorLogHandler()]
            )
        );
    }
}
