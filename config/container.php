<?php
declare(strict_types=1);

use Zend\ServiceManager\ServiceManager;
use Selami\Router;
use Psr\Http\Message\ServerRequestInterface;
use Symfony\Component\HttpFoundation\Session\Session as SymfonySession;
use Zend\Config\Config as ZendConfig;
use Selami\View\ViewInterface;

$config = include __DIR__ . '/config.php';
$request = Selami\Http\ServerRequestFactory::fromGlobals($_SERVER, $_GET, $_POST, $_COOKIE, $_FILES);
$container = new ServiceManager($config['dependencies']);

$container->setService('commands', $config['commands']);
$container->setService(ZendConfig::class, new ZendConfig($config));


$container->setService(ServerRequestInterface::class, $request);
$container->setFactory(
    SymfonySession::class, function () use ($container) {
        ini_set('session.use_cookies', '1');
        ini_set('session.use_only_cookies', '1');
        ini_set('session.cookie_httponly', '1');
        ini_set('session.name', 'SELAMISESSID');
        return new SymfonySession();
    }
);
if (isset($routes)) {
    $router = new Router(
        $config['app']['default_return_type'] ?? 'html',
        $request->getMethod(),
        $request->getUri()->getPath(),
        '',
        $config['app']['cache_file']
    );
    foreach ($routes as $route) {
        $router->add($route[0], $route[1], $route[2], $route[3], $route[4]??'');
    }
    $container->setService(Router::class, $router);
}

$container->setFactory(
    ViewInterface::class, function () use ($config, $request) {
        return new Selami\View\Twig\Twig($config['app'], $request->getParams());
    }
);
return $container;
