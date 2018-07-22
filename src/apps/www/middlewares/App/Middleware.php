<?php
declare(strict_types=1);

namespace Selami\Middleware\App;
use Selami\Foundation\App as SelamiApp;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response;
use Psr\Container\ContainerInterface;

class Middleware implements MiddlewareInterface
{
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $appRoutes = require __DIR__ . '/routes.php';
        $this->container->setService('routes', $appRoutes);
        $this->container->setService(ServerRequestInterface::class, $request);
        $myApp = $this->container->get('SelamiApplication');
        return $myApp($request, new Response());
    }


}