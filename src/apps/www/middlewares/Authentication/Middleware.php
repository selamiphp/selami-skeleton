<?php
declare(strict_types=1);

namespace Selami\Middleware\Authentication;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response;
use Psr\Container\ContainerInterface;
use Selami\Foundation\App as SelamiApplication;

class Middleware implements MiddlewareInterface
{
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $urlPath = $request->getUri()->getPath();
        //var_dump($urlPath .'<<<-');
        $appRoutes = require __DIR__ . '/routes.php';
        $config = $this->container->get('config');
        $config['app']['cache_file'] = './cache/authentication.fastroute.cache';
        $this->container->setAllowOverride(true);
        $this->container->setService('config', $config);
        $this->container->setService('routes', $appRoutes);
        $this->container->setService(ServerRequestInterface::class, $request);
        $this->container->setAllowOverride(false);

        $myApp = $this->container->get(SelamiApplication::class);
        $response =  $myApp($request, new Response());
        return $response;
    }


}