<?php

namespace Pharam\Console\Traits;

use Pharam\Console\ServiceContainer;

trait ContainerAwareTrait
{
    /**
     * @var ServiceContainer
     */
    protected $container;


    /**
     * @param ServiceContainer $container
     */
    public function setContainer(ServiceContainer $container)
    {
        $this->container = $container;
    }

    /**
     * @return ServiceContainer
     */
    public function getContainer()
    {
        return $this->container;
    }
}
