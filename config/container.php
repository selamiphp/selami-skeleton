<?php
declare(strict_types=1);

use Zend\ServiceManager\ServiceManager;
use Selami\Stdlib\BaseUrlExtractor;

$config = include __DIR__ . '/config.php';

$globals = include __DIR__. '/globals.php';

$container = new ServiceManager($config['dependencies']);

if (PHP_SAPI !== 'cli') {
    $config['app']['base_url'] = BaseUrlExtractor::getBaseUrl($_SERVER);
    $container->setService('routes', $routes);
}
$container->setService('config', $config);
$container->setService('globals', $globals);
$container->setService('commands', $config['commands']);
return $container;
