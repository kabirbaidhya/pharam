<?php

namespace Pharam;

use Pharam\Console\IocBinder;
use Pharam\Console\ServiceContainer;
use Pharam\Console\AbstractApplication;
use Pharam\Console\Commands\InitCommand;
use Pharam\Console\Commands\GenerateCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Application extends AbstractApplication
{

    const APP_NAME = 'Pharam';
    const APP_VERSION = '0.1.0';
    //
    const APP_CONFIG_FILE = 'pharam.yml';
    const DIST_CONFIG_FILE = 'pharam.yml.dist';

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

    public function run(InputInterface $input = null, OutputInterface $output = null)
    {
        $this->binder->postBind($this->getConfig());

        return parent::run($input, $output);
    }


}
