<?php
declare(strict_types=1);

namespace SelamiApp\Factories;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;

class ModelFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $dependency = $container->get(stdClass::class);
        return new $requestedName($dependency);
    }
}
