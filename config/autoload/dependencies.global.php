<?php
declare(strict_types=1);

use Psr\Http\Message\ServerRequestInterface;
use Psr\Container\ContainerInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Selami\Router;
use Selami\View\ViewInterface as SelamiView;
use Twig_Environment as TwigEnvironment;
use Selami\Foundation\App as SelamiApplication;
use SelamiApp\Factories;
return [
    'dependencies' => [
        'factories' => [
            ServerRequestInterface::class => Factories\ServerRequestFactory::class,
            SelamiApplication::class => Factories\SelamiApplicationFactory::class,
            Session::class => Factories\SymfonySessionFactory::class,
            Router::class => Factories\RouterFactory::class,
            TwigEnvironment::class => Factories\TwigFactory::class,
            SelamiView::class => Factories\SelamiViewFactory::class
        ],
    ]
];