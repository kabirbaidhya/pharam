<?php

namespace Pharam\Traits;

use Pharam\Application;
use Symfony\Component\Yaml\Yaml;
use Illuminate\Filesystem\Filesystem;

/**
 * Reading config from the file
 */
trait ConfigurableTrait
{
    /**
     * @var array
     */
    protected $config;

    /**
     * Auto detects configuration if any configuration files found
     *
     * @return $this
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function autodetectConfig()
    {
        $filesystem = new Filesystem();
        $configPath = getcwd() . '/' . Application::APP_CONFIG_FILE;
        if ($filesystem->exists($configPath)) {
            $this->setConfig(Yaml::parse($filesystem->get()));
        }

        return $this;
    }

    /**
     * @return array
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * @param array $config
     */
    public function setConfig(array $config)
    {
        $this->config = $config;
    }
}
