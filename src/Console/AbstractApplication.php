<?php

namespace Pharam\Console;

use Pharam\Console\Traits\ConfigurableTrait;
use Symfony\Component\Console\Application as SymfonyApplication;
use Symfony\Component\Console\Input\ArgvInput;
use Symfony\Component\Console\Output\ConsoleOutput;

/**
 *
 */
abstract class AbstractApplication extends SymfonyApplication
{
    use ConfigurableTrait;

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
        $input = new ArgvInput();
        $output = new ConsoleOutput();

        foreach ($this->getCommands() as $commandClass) {
            $command = new $commandClass();
            $this->add($command);
        }

        return parent::run($input, $output);
    }


}
