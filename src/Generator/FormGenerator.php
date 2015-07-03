<?php

namespace Pharam\Generator;

/**
 * Default Form Generator
 */
class FormGenerator implements FormGeneratorInterface
{
    public function generate()
    {
        foreach ($this->getFields() as $field) {
            echo $field->getHtml();
        }
    }

    public function getElements()
    {
        // TODO: Implement getFields() method.
    }
}
