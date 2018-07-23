<?php
declare(strict_types=1);
define('APP_DIR', __DIR__);
$_appLang = 'en';
if (strpos($_SERVER['REQUEST_URI'], '/tr') === 0) {
    $_appLang = 'tr';
}
define('RUNTIME_LANG', $_appLang);
require dirname(__DIR__) . '/bootstrap.php';

use Zend\Diactoros\Response;
use Zend\Diactoros\Server;
use Zend\Stratigility\MiddlewarePipe;
use Zend\Diactoros\Uri;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use function Zend\Stratigility\middleware;
use function Zend\Stratigility\path;
use function Zend\Stratigility\doublePassMiddleware;

use Selami\Middleware\Authorization\Middleware as AuthorizationMiddleware;
use Selami\Middleware\Authentication\Middleware as AuthenticationMiddleware;
use Selami\Middleware\App\Middleware as ApplicationMiddleware;

use Symfony\Component\HttpFoundation\Session\Session;

$container = include SYS_DIR . '/config/container.php';

$app = new MiddlewarePipe();
$server = Server::createServer([$app, 'handle'], $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES);

// Check Authorization
$app->pipe(doublePassMiddleware(function (ServerRequestInterface $request, ResponseInterface $response, $next) use ($container) {
    /**
     * @var $session Session
     */
    $session = $container->get(Session::class);
    $loggedUserId = $session->get('logged_user_id');
    $urlPath = $request->getUri()->getPath();
    if ($loggedUserId === null && strpos($urlPath, '/auth') !== 0) {
        return $response->withHeader('Location', '/auth')->withStatus(301);
    }
    if ($loggedUserId !== null) {
        $request = $request->withAttribute('loggedUserId', $loggedUserId);
    }
    $response = $next($request, $response);
    return $response;
}, new Response()));

// Authentication Middleware
$app->pipe(path('/auth', new AuthenticationMiddleware($container)));

// APP
$app->pipe(new ApplicationMiddleware($container));





$server->listen();

