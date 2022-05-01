<?php

namespace App\Handlers;

use Psr\Log\LoggerInterface;
use Restolia\Http\Response;
use Symfony\Component\HttpFoundation\Request;

class StatusHandler
{
    public function __construct(private LoggerInterface $logger)
    {
    }

    public function handle(Request $request, Response $response): void
    {
        $this->logger->debug('hello service handling request...');

        $response->json(
            [
                'took' => sprintf("%.2fms", (microtime(true) - APP_START) * 1000),
                'memory' => memory_get_peak_usage(),
            ],
        );
        $response->send();
    }
}