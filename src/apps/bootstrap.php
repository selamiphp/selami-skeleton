<?php
declare(strict_types=1);

define('SYS_DIR', dirname(__DIR__, 2));
chdir(SYS_DIR);

use Selami\Foundation\App;
require  SYS_DIR . '/vendor/autoload.php';
$routes = include APP_DIR . '/routes.php';
$container = include SYS_DIR . '/config/container.php';
$myApp = $container->get(App::class);
$myApp->sendResponse();
