<?php
declare(strict_types=1);

return [
    'app' => [
        'app_namespace' => 'MyApp',
        'template_engine' => 'Twig',
        'templates_dir' => APP_DIR .'/templates',
        'cache_dir' => '/tmp',
        'debug' => 1,
        'auto_reload' => 1
    ]
];