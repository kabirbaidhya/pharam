<?php

namespace Pharam\Console\Commands;

use Pharam\Console\Command;
use Pharam\Generator\Mapper;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class GenerateCommand extends Command
{
    protected $name = 'generate';

    protected $description = 'Generates the Form';

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var Mapper $mapper */
        $mapper = $this->container->make('mapper');
        $mapper->readTable('user');

        $generator = $this->getContainer()->make('form-generator');

        $html = $generator->setMapper($mapper)->generate();
        echo $html;
    }


}
