<?php
declare(strict_types=1);
define('APP_DIR', __DIR__);
require dirname(__DIR__) . '/bootstrap.php';

use Zend\Diactoros\Response;
use Zend\Diactoros\Server;
use Zend\Stratigility\MiddlewarePipe;

use Psr\Http\Message\ServerRequestInterface;

use function Zend\Stratigility\middleware;
use function Zend\Stratigility\path;
use function Zend\Stratigility\doublePassMiddleware;

use Selami\Middleware\Auth\Middleware as AuthMiddleware;
use Selami\Middleware\App\Middleware as ApplicationMiddleware;

$container = include SYS_DIR . '/config/container.php';

$app = new MiddlewarePipe();
$server = Server::createServer([$app, 'handle'], $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES);

// AUTH
$app->pipe(doublePassMiddleware(function (ServerRequestInterface $request, $response, $next) {
    $request = $request->withAttribute('selamiAuth', 'pass');
    $response = $next($request, $response->withHeader('X-Auth', 'Pass'));
    return $response;
}, new Response()));

// Auth Middleware
$app->pipe(path('/auth', new AuthMiddleware($container)));

// APP
$app->pipe(new ApplicationMiddleware($container));





$server->listen();

