<?php
declare(strict_types=1);


namespace SelamiApp\Controller\Contents;

use SelamiApp\Controller\Application;
use Selami\Interfaces\Application as App;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ServerRequestInterface;
use Symfony\Component\HttpFoundation\Session\Session;

abstract class ContentsController extends Application
{

    public function __construct(ServerRequestInterface $request, Session $session, ?array $args)
    {
        $this->session = $session;
        $this->request = $request;
        $this->args = $args;
    }

    public static function factory(ContainerInterface $container, ?array $args) : App
    {
        $session = $container->get(Session::class);
        $request = $container->get(ServerRequestInterface::class);
        return new static($request, $session, $args);
    }
}
