<?php
declare(strict_types=1);
chdir(dirname(__DIR__));
require_once './vendor/autoload.php';
use Selami\Console\ApplicationFactory;
$container  = require './config/container.php';
$cli = ApplicationFactory::makeApplication($container);
$cli->run();