<?php
declare(strict_types=1);

use Zend\ServiceManager\ServiceManager;
use Selami\Stdlib\BaseUrlExtractor;

$config = include __DIR__ . '/config.php';

$globals = include __DIR__. '/globals.php';
if (PHP_SAPI !== 'cli') {
    $config['app']['base_url'] = BaseUrlExtractor::getBaseUrl($_SERVER);
}
$container = new ServiceManager($config['dependencies']);
if (isset($routes)) {
    $container->setService('routes', $routes);
}


$container->setService('config', $config);
$container->setService('globals', $globals);
$container->setService('commands', $config['commands']);
return $container;
