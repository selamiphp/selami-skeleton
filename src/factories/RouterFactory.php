<?php
declare(strict_types=1);

namespace SelamiApp\Factories;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Psr\Http\Message\ServerRequestInterface;
use Selami\Router;

class RouterFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        /**
         * @var array $config
         */
        $config = $container->get('config');
        /**
         * @var array $routes
         */
        $routes = $container->get('routes');
        /**
         * @var ServerRequestInterface $request
         */
        $request = $container->get(ServerRequestInterface::class);
        $router = new Router(
            $config['app']['default_return_type'] ?? Router::HTML,
            $request->getMethod(),
            $request->getUri()->getPath(),
            '',
            $config['app']['cache_file']
        );
        foreach ($routes as $route) {
            $router->add($route[0], $route[1], $route[2], $route[3], $route[4] ?? '');
        }
        return $router;
    }
}