<?php
declare(strict_types=1);

use SelamiApp\Controller;
use Selami\Router;

return [
    [Router::GET, '/', Controller\Contents\Main::class, Router::HTML],
    [Router::GET, '/{lang}', Controller\Contents\Main::class, Router::HTML, 'home'],
    [Router::GET, '/{lang}/category/{category}', Controller\Contents\Category::class, Router::HTML, 'category'],
    [Router::GET, '/{lang}/{year}/{month}/{slug}', Controller\Contents\Post::class, Router::JSON, 'post'],
    [Router::GET, '/{catchAnythingElse:.+}',  Controller\Contents\NotFound::class, Router::HTML, '404'],
];
