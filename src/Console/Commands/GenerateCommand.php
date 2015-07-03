<?php

namespace Pharam\Console\Commands;

use Doctrine\DBAL\Connection;
use Pharam\Console\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Pharam\Generator\FormGenerator;

class GenerateCommand extends Command
{
    protected $name = 'generate';

    protected $description = 'Generates the Form';

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var Connection $connection */
        $connection = $this->getContainer()['connection'];

        dump($connection->getSchemaManager()->listTables());
    }


}
