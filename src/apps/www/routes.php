<?php
declare(strict_types=1);

use SelamiApp as c;

return [
    ['get', '/', c\Contents\Main::class, 'html', 'home'],
    ['get', '/category/{category}', c\Contents\Category::class, 'html', 'category'],
    ['get', '/{year}/{month}/{slug}', c\Contents\Post::class, 'json', 'post']
];
