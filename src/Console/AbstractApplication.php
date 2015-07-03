<?php

namespace Pharam\Console;

use Pharam\Console\Traits\ConfigurableTrait;
use Pharam\Console\Traits\ContainerAwareTrait;
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
     * Runs the current application.
     */
    public function run()
    {
        foreach ($this->getCommands() as $commandClass) {
            $command = new $commandClass();
            $command->setContainer($this->getContainer());
            $this->add($command);
        }

        $input = $this->getContainer()->make('input');
        $output = $this->getContainer()->make('output');

        return parent::run($input, $output);
    }


}
