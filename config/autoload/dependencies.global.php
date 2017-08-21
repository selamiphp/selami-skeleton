<?php
declare(strict_types=1);

use Psr\Http\Message\ServerRequestInterface;
use Selami\Router;
use Selami\View\ViewInterface as SelamiView;
use Twig_Environment as TwigEnvironment;
use Selami\Foundation\App as SelamiApplication;
use Selami\Factories;
return [
    'dependencies' => [
        'factories' => [
            ServerRequestInterface::class => Factories\ServerRequestFactory::class,
            SelamiApplication::class => Factories\SelamiApplicationFactory::class,
            Router::class => Factories\RouterFactory::class,
            TwigEnvironment::class => Factories\TwigFactory::class,
            SelamiView::class => Factories\SelamiViewTwigFactory::class
        ],
    ]
];