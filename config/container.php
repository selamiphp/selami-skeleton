<?php
declare(strict_types=1);

use Zend\ServiceManager\ServiceManager;
use Selami\Router;
use Psr\Http\Message\ServerRequestInterface;
use Symfony\Component\HttpFoundation\Session\Session as SymfonySession;
use Zend\Config\Config as ZendConfig;
use Selami\View\ViewInterface;
use Twig\Environment as TwigEnvironment;
use SelamiApp\Extension\Twig\Extensions as TwigExtensions;
$config = include __DIR__ . '/config.php';
$request = Selami\Http\ServerRequestFactory::fromGlobals($_SERVER, $_GET, $_POST, $_COOKIE, $_FILES);
$container = new ServiceManager($config['dependencies']);

$container->setService('commands', $config['commands']);
$container->setService(ZendConfig::class, new ZendConfig($config));


$container->setService(ServerRequestInterface::class, $request);
$container->setFactory(
    SymfonySession::class, function () {
        ini_set('session.use_cookies', '1');
        ini_set('session.use_only_cookies', '1');
        ini_set('session.cookie_httponly', '1');
        ini_set('session.name', 'SELAMISESSID');
        return new SymfonySession();
    }
);
if (isset($routes)) {
    $router = new Router(
        $config['app']['default_return_type'] ?? Router::HTML,
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
    TwigEnvironment::class, function () use ($config) {
        $loader = new Twig\Loader\FilesystemLoader($config['app']['templates_dir']);
        return new TwigEnvironment($loader, $config['app']);
    }
);


$container->setFactory(
    ViewInterface::class, function ($container) use ($config, $request) {
        $config['app']['query_parameters'] =  $request->getParams();
        $extensions = new TwigExtensions($container->get(TwigEnvironment::class));
        $extensions->translator($config['lang']??[]);
        return Selami\View\Twig\Twig::viewFactory($container, $config['app']);
    }
);
return $container;
