<?php

namespace Pharam\Console\Commands;

use Pharam\Console\Command;
use Pharam\Generator\Mapper;
use Illuminate\Filesystem\Filesystem;
use Pharam\Generator\FormGeneratorInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
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
            ['all', 'a', InputOption::VALUE_NONE, 'Generates for all project'],
            ['extension', 'x', InputOption::VALUE_OPTIONAL, 'Specify extension explicitly', 'php'],
        ];
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|null|void
     * @throws \Exception
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $all = $input->getOption('all');
        $extension = $input->getOption('extension');
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

        /** @var FormGeneratorInterface $generator */
        $generator = $this->getContainer()->make('form-generator');

        /** @var Filesystem $filesystem */
        $filesystem = $this->getContainer()->make('filesystem');
        $formPath = rtrim($this->getContainer()->make('config')['paths']['form'], '/') . '/';

        if (!$filesystem->isDirectory($formPath)) {
            throw new \Exception(sprintf("Path %s doesn't exist", $formPath));
        }

        foreach ($tables as $table) {
            $mapper->setTable($table);
            $html = $generator->setMapper($mapper)->generate();

            $filePath = $formPath . sprintf('%s.%s', $table->getName(), $extension);
            $filesystem->put($filePath, $html);
        }
    }

}
