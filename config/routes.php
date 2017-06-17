<?php
declare(strict_types=1);

use Selami\Router;
use Zend\Config\Config;
$router = new Router(
    $container->get(Config::class)->get('default_return_type', 'html'),
    $request->getMethod(),
    $request->getUri()->getPath()
);

foreach ((array) $routes as $route) {
    $router->add($route[0], $route[1], $route[2], $route[3], $route[4]??'');
}
return $router;