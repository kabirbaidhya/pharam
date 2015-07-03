<?php

namespace Pharam\Generator;

/**
 * Default Form Generator
 */
class FormGenerator implements FormGeneratorInterface
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

    public function generate()
    {
        foreach ($this->getElements() as $element) {
            echo $element->getHtml();
        }
    }

    public function getElements()
    {
        return $this->getMapper()->getElements();
    }

public function divZendContainer($objElement)
    {
        $divOutput = '<div class="group">
                        <label>Transaction:</label>
                        <div class="controls">';
        if (is_object($objElement)) {
            $divOutput.=$objProp->Field->getHtml();
        }
        $divOutput.=' </div>
                    </div>';
        return $divOutput;
    }
}
