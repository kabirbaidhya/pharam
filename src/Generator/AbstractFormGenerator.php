<?php

namespace Pharam\Generator;
use Pharam\Console\Traits\ContainerAwareTrait;

/**
 * Class AbstractFormGenerator
 * @package Pharam\Generator
 */
abstract class AbstractFormGenerator implements FormGeneratorInterface
{
    use ContainerAwareTrait;

    /**
     * @var Mapper
     */
    protected $mapper;

    /**
     * Sets Mapper object
     * @param Mapper $mapper
     * @return $this
     */
    public function setMapper(Mapper $mapper)
    {
        $this->mapper = $mapper;

        return $this;
    }

    /**
     * Gets Mapper object
     * @return Mapper
     * @throws \Exception
     */
    public function getMapper()
    {
        if (!$this->mapper) {
            throw new \Exception('Mapper not set');
        }

        return $this->mapper;
    }

    /**
     * Calls mappers is get elements function.
     * @return array
     * @throws \Exception
     */
    public function getElements()
    {
        return $this->getMapper()->getElements();
    }

}
