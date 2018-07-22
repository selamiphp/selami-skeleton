<?php
declare(strict_types=1);

use Selami\Auth\Controller;
use Selami\Router;

return [
    [Router::GET, '/auth', Controller\Auth\Main::class, Router::HTML],
    [Router::GET, '/{catchAnythingElse:.+}',  Controller\Auth\NotFound::class, Router::HTML, '404'],
];
