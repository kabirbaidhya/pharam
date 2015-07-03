<?php

namespace Pharam;

use Pharam\Console\IocBinder;
use Pharam\Console\ServiceContainer;
use Pharam\Console\AbstractApplication;
use Pharam\Console\Commands\InitCommand;
use Pharam\Console\Commands\GenerateCommand;

class Application extends AbstractApplication
{
    const APP_NAME = 'Pharam';
    const APP_VERSION = '0.1.0';
    //
    const APP_CONFIG_FILE = 'pharam.yml';

    /**
     * @var IocBinder
     */
    protected $binder;

    public function __construct()
    {
        parent::__construct(static::APP_NAME, static::APP_VERSION);

        $this->setContainer(new ServiceContainer());

        $this->binder = new IocBinder($this->getContainer());

        $this->binder->preBind();
    }

    /**
     * Returns the list of commands that the application exposes
     *
     * @return array
     */
    protected function getCommands()
    {
        return [
            InitCommand::class,
            GenerateCommand::class,
        ];
    }

    public function run()
    {
        $this->binder->postBind($this->getConfig());

        return parent::run();
    }


}
