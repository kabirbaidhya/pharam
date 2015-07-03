<?php

namespace Pharam\Generator;

/**
 * Default Form Generator
 */
class FormGenerator extends AbstractFormGenerator
{
    public function generate()
    {
        foreach ($this->getElements() as $element) {
            echo $element->getHtml();
        }

        return 'Hello World form';
    }

}
