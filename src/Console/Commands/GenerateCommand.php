<?php

namespace Pharam\Console\Commands;

use Pharam\Console\Command;
use Pharam\Generator\Mapper;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class GenerateCommand extends Command
{
    protected $name = 'generate';

    protected $description = 'Generates the Form';

    protected function getArguments()
    {
        return [
            ['table', InputArgument::IS_ARRAY, 'Specify table name ']
        ];
    }

    protected function getOptions()
    {
        return [
            ['all', 'a', InputOption::VALUE_NONE],
        ];
    }


    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return int|null|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $all = $input->getOption('all');
        $db = $this->getContainer()->make('db');

        if ($all === true) {
            $tables = $db->getAllTables();
        } else {
            $tables = $input->getArgument('table');
            $tables = $db->getTables($tables);
        }

        if (empty($tables)) {
            throw new \Exception('No tables found');
        }

        /** @var Mapper $mapper */
        $mapper = $this->container->make('mapper');
        $generator = $this->getContainer()->make('form-generator');

        foreach ($tables as $table) {
            $mapper->setTable($table);
            $html = $generator->setMapper($mapper)->generate();

            $this->getContainer()->make('output')->writeln('<info>Generating for ' . $table->getName() . '</info>');
            // TODO Write this html to file
        }

    }


}
