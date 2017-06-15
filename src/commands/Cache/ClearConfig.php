<?php
declare(strict_types=1);

namespace SelamiApp\Command\Cache;

use Selami\Console\Command as SelamiCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Zend\Config\Config;
use Symfony\Component\Console\Exception\InvalidArgumentException;

class ClearConfig extends SelamiCommand
{
    /**
     * @inheritdoc
     * @throws InvalidArgumentException
     */
    protected function configure() : void
    {
        $this
            ->setName('cache:clear-config')
            ->setDescription('Clears generated config file.');
    }

    /**
     * @inheritdoc
     */
    protected function execute(InputInterface $input, OutputInterface $output) : void
    {
        $cachedConfigFile = SELAMI_CONSOLE_PATH . '/cache/app_config.php';
        $unlinkResult  =  (unlink($cachedConfigFile) === True) ? 'deleted.':'could\'t deleted';
        $output->writeln($cachedConfigFile . ' ' . $unlinkResult );
    }
}
