<?php

namespace App;

use App\Handlers\StatusHandler;
use App\Providers\LoggerProvider;
use FastRoute\RouteCollector;
use Restolia\Foundation\Application;
use Restolia\Providers\EnvironmentProvider;
use Symfony\Component\Console\Command\Command;

class App extends Application
{
    public static function providers(): array
    {
        return [
            new EnvironmentProvider(APP_ROOT),
            LoggerProvider::class,
        ];
    }

    /**
     * @return array<Command>
     */
    public function commands(): array
    {
        return [];
    }

    public function routes(RouteCollector $router): void
    {
        $router->get('/', [StatusHandler::class, 'handle']);
    }
}
