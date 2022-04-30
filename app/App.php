<?php

namespace App;

use App\Handlers\StatusHandler;
use App\Providers\LoggerProvider;
use FastRoute\RouteCollector;
use Restolia\Service\Service;

class App extends Service
{
    public static function providers(): array
    {
        return [
            LoggerProvider::class,
        ];
    }

    public function routes(RouteCollector $router): void
    {
        $router->get('/', [StatusHandler::class, 'handle']);
    }
}
