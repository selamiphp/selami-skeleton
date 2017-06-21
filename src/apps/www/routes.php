<?php
declare(strict_types=1);

use SelamiApp\Controller;

return [
    ['get', '/', Controller\Contents\Main::class, 'html', 'home'],
    ['get', '/{lang}', Controller\Contents\Main::class, 'html', 'home'],
    ['get', '/{lang}/category/{category}', Controller\Contents\Category::class, 'html', 'category'],
    ['get', '/{lang}/{year}/{month}/{slug}', Controller\Contents\Post::class, 'json', 'post'],
    ['get', '/{catchAnythingElse:.+}',  Controller\Contents\NotFound::class, 'html', '404'],
];
