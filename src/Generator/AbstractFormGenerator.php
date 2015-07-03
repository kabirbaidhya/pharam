<?php

namespace Pharam\Generator;

abstract class AbstractFormGenerator implements FormGeneratorInterface
{
    /**
     * @var Mapper
     */
    protected $mapper;

    /**
     * @param Mapper $mapper
     * @return $this
     */
    public function setMapper(Mapper $mapper)
    {
        $this->mapper = $mapper;

        return $this;

    }

    /**
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

    public function getElements()
    {
        return $this->getMapper()->getElements();
    }
}
