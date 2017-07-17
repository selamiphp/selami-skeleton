<?php
declare(strict_types=1);


namespace SelamiApp\Controller;

use Psr\Container\ContainerInterface as Container;
use Symfony\Component\HttpFoundation\Session\Session as SymfonySession;
use Psr\Http\Message\ServerRequestInterface;

abstract class Application
{
    /**
     * @var Container
     */
    protected $container;
    /**
     * @var array
     */
    protected $args;
    /**
     * @var SymfonySession
     */
    protected $session;
    /**
     * @var ServerRequestInterface
     */
    protected $request;
}
