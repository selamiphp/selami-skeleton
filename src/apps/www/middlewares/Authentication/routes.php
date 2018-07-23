<?php
declare(strict_types=1);

use Selami\Authentication\Controller;
use Selami\Router;

// Routes are /quth/:route
return [
    [Router::GET, '/', Controller\Authentication\Main::class, Router::HTML],
    [Router::POST, '/login', Controller\Authentication\Check::class, Router::JSON],
    [Router::GET, '/{catchAnythingElse:.+}',  Controller\Authentication\NotFound::class, Router::HTML, '404'],
];
