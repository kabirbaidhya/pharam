<?php

namespace Pharam\Console;

use Illuminate\Filesystem\Filesystem;
use Symfony\Component\Console\Input\ArgvInput;
use Symfony\Component\Console\Output\ConsoleOutput;
use Doctrine\DBAL\Configuration as DbalConfiguration;
use Doctrine\DBAL\DriverManager as DoctrineDriverManager;

class IocBinder
{
    public function __construct(ServiceContainer $container)
    {
        $this->container = $container;
    }

    public function preBind()
    {
        $this->container->bind('filesystem', function () {
            return new Filesystem();
        });

        $this->container->bind('input', function () {
            return new ArgvInput();
        });

        $this->container->bind('output', function () {
            return new ConsoleOutput();
        });
    }

    public function postBind(array $configuration)
    {
        $this->container->instance('config', $configuration);

        $this->container->singleton('connection', function ($con) {
            $connectionParams = $con['config']['database'];

            return DoctrineDriverManager::getConnection($connectionParams, new DbalConfiguration());
        });

        $this->container->singleton('form-generator', function ($con) {
            $generatorClass = $this->container['config']['generators']['form'];

            return new $generatorClass();
        });
    }

}
