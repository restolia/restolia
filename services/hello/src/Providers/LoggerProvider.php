<?php

namespace Hello\Providers;

use Monolog\Handler\ErrorLogHandler;
use Monolog\Logger;
use Psr\Log\LoggerInterface;
use Restolia\Service\Provider;

class LoggerProvider extends Provider
{
    public function __construct()
    {
        // The constructor can type hint dependencies, so you can
        // use other container bound classes here.
    }

    public function register(): void
    {
        $this->bind(
            LoggerInterface::class,
            new Logger('logger', [new ErrorLogHandler()])
        );
    }
}
