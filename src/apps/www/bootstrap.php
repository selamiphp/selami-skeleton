<?php
declare(strict_types=1);

define('SYS_DIR', dirname(__DIR__, 3));
chdir(SYS_DIR);
define('APP_DIR', __DIR__);
require SYS_DIR . '/vendor/autoload.php';
$routes = require __DIR__ . '/routes.php';
$container = include SYS_DIR . '/config/container.php';

$myApp = Selami\Foundation\App::selamiApplicationFactory($container);
$myApp->sendResponse();