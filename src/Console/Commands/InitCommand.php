<?php

namespace Pharam\Console\Commands;

use Pharam\Application;
use Pharam\Console\Command;
use InvalidArgumentException;
use Illuminate\Filesystem\Filesystem;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class InitCommand extends Command
{

    protected $name = 'init';

    protected $description = 'Initializes & generates an config file';

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var FileSystem $fileSystem */
        $fileSystem = $this->getContainer()->make('filesystem');

        $sourceFile = __DIR__ . '/../../../' . Application::DIST_CONFIG_FILE;
        $destinationFile = getcwd() . '/' . Application::APP_CONFIG_FILE;

        if ($fileSystem->exists($destinationFile)) {
            throw new InvalidArgumentException('Config file has already been initialized.');
        }

        $fileSystem->copy($sourceFile, $destinationFile);

        $output->writeln('<comment>Creating pharam.yml file...</comment> <info>✔</info>');
        $output->writeln('<comment>pharam.yml file created at:</comment> ' . getcwd());
    }
}
