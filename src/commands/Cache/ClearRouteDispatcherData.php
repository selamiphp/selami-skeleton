<?php
declare(strict_types=1);

namespace SelamiApp\Command\Cache;

use Selami\Console\Command as SelamiCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Zend\Config\Config;
use Symfony\Component\Console\Exception\InvalidArgumentException;

class ClearRouteDispatcherData extends SelamiCommand
{
    /**
     * @inheritdoc
     * @throws InvalidArgumentException
     */
    protected function configure() : void
    {
        $this
            ->setName('cache:clear-routes')
            ->setDescription('Clears generated config file.');
    }

    /**
     * @inheritdoc
     */
    protected function execute(InputInterface $input, OutputInterface $output) : void
    {
        $config = $this->container->get(Config::class);
        $routeCahceFile = $config->app->get('cache_file', '');
        $unlinkResult  =  (unlink($routeCahceFile) === True) ? 'deleted.':'could\'t deleted';
        $output->writeln($routeCahceFile . ' ' . $unlinkResult );
    }
}
