<?php

namespace Pharam\Console\Commands;

use Pharam\Console\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class InitCommand extends Command
{
    protected $name = 'init';

    protected $description = 'Initializes & generates an config file';

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('You executed init command');
    }
}
