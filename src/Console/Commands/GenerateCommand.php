<?php

namespace Pharam\Console\Commands;

use Pharam\Console\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class GenerateCommand extends Command
{
    protected $name = 'generate';

    protected $description = 'Generates the Form';

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('You executed generate command');
    }


}
