<?php

namespace Pharam\Console;

use Pharam\Console\Traits\ConfigurableTrait;
use Pharam\Console\Traits\ContainerAwareTrait;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Application as SymfonyApplication;

/**
 *
 */
abstract class AbstractApplication extends SymfonyApplication
{

    use ConfigurableTrait;
    use ContainerAwareTrait;

    /**
     * Returns the list of commands that the application exposes
     *
     * @return array
     */
    protected abstract function getCommands();

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     * @throws \Exception
     */
    public function run(InputInterface $input = null, OutputInterface $output = null)
    {
        foreach ($this->getCommands() as $commandClass) {
            $command = new $commandClass();
            $command->setContainer($this->getContainer());
            $this->add($command);
        }

        return parent::run($input, $output);
    }


}
