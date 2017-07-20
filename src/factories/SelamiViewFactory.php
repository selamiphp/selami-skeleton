<?php
declare(strict_types=1);

namespace SelamiApp\Factories;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Psr\Http\Message\ServerRequestInterface;
use Twig_Environment;
use SelamiApp\Extension\Twig\Extensions as TwigExtensions;
use Selami\View\Twig\Twig as SelamiTwig;

class SelamiViewFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $config = $container->get('config');
        $request = $container->get(ServerRequestInterface::class);
        $config['app']['query_parameters'] =  $request->getParams();
        $twig = $container->get(Twig_Environment::class);
        $extensions = new TwigExtensions($twig);
        $extensions->translator($config['lang']??[]);
        return new SelamiTwig($twig, $config['app']);
    }
}