<?php
declare(strict_types=1);

namespace SelamiApp\Command\Server;

use Selami\Console\Command as SelamiCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Process\Exception\LogicException;
use Symfony\Component\Console\Exception\InvalidArgumentException;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Exception\RuntimeException;
use Symfony\Component\Process\Exception\InvalidArgumentException as ProcessInvalidArgumentException;
class ServerRun extends SelamiCommand
{
    /**
     * @inheritdoc
     * @throws InvalidArgumentException
     */
    protected function configure() : void
    {
        $this
            ->setName('server:run')
            ->setDescription('Run web server locally');
    }

    /**
     * @inheritdoc
     * @throws RuntimeException
     * @throws ProcessFailedException
     * @throws LogicException
     * @throws ProcessInvalidArgumentException
     */
    protected function execute(InputInterface $input, OutputInterface $output) : void
    {
        $publicFolder = './public';
        $output->writeln('Starting Selami Skeleton App local web server from port 8080 on 127.0.0.1 at '.$publicFolder);
        $process = new Process('php -S 127.0.0.1:8080 -t ' . $publicFolder);
        $process->setTimeout(null);
        $process->run();
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }
        $output->writeln($process->getOutput());
    }
}
