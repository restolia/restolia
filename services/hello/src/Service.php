<?php

namespace Hello;

use FastRoute\RouteCollector;
use Hello\Providers\LoggerProvider;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Request;
use Restolia\Http\Response;

class Service extends \Restolia\Service\Service
{
    /**
     * The constructor uses dependency injection and so the
     * concrete class for LoggerInterface is automatically injected when
     * type hinted as we have set up a Provider, see Providers directory.
     *
     * @param  LoggerInterface  $logger
     */
    public function __construct(private LoggerInterface $logger)
    {
    }

    /**
     * Use this method to return an array of providers
     * you would like to be initialised before the
     * __construct() method is called.
     *
     * @return string[]
     */
    public static function providers(): array
    {
        return [
            LoggerProvider::class,
        ];
    }

    /**
     * This is where you can perform additional tasks
     * before the handle method is called.
     *
     * @return void
     */
    public function boot(): void
    {
        // TODO: perform any setup tasks.
    }

    /**
     * Define your services routes.
     *
     * @param  RouteCollector  $router
     */
    public function routes(RouteCollector $router): void
    {
        $router->get('/', [$this, 'handle']);
    }

    public function handle(Request $request, Response $response): void
    {
        $this->logger->debug('hello service handling request...');

        $response->json(
            [
                'service' => self::class,
            ],
        );
        $response->send();
    }
}
