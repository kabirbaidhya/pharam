<?php

namespace Pharam\Generator;

/**
 * Default Form Generator
 */
class FormGenerator extends AbstractFormGenerator
{

    protected $htmlOutput;

    public function generate()
    {
        foreach ($this->getElements() as $element) {
           $this->pushHTML($element);
        }
        echo $this->htmlOutput;
    }

    protected function pushHTML($element)
    {
        $this->htmlOutput.=get_container($element);
    }

}
