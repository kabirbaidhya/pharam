<?php

namespace Pharam;

use Pharam\Traits\ConfigurableTrait;
use Symfony\Component\Console\Application as SymfonyApplication;

/**
 *
 * @author Kabir Baidhya
 */
class Application extends SymfonyApplication
{
    use ConfigurableTrait;

    const APP_NAME = 'Pharam';
    const APP_VERSION = '0.1.0';
    //
    const APP_CONFIG_FILE = 'pharam.yml';

    public function __construct()
    {
        parent::__construct(static::APP_NAME, static::APP_VERSION);
    }
}
