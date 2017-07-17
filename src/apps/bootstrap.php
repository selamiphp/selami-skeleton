<?php
declare(strict_types=1);

define('SYS_DIR', dirname(__DIR__, 2));
chdir(SYS_DIR);
require  SYS_DIR . '/vendor/autoload.php';
$routes = include APP_DIR . '/routes.php';
$container = include SYS_DIR . '/config/sites/container.' . RUNTIME_PLATFORM . '.php';
$myApp = Selami\Foundation\App::selamiApplicationFactory($container);
$myApp->sendResponse();
