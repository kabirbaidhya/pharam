<?php

namespace Pharam\Generator;

/**
 * Default Form Generator
 */
class FormGenerator extends AbstractFormGenerator
{

    public function generate()
    {
        $html = '';
        foreach ($this->getElements() as $element) {
            $html .= get_container($element);
        }
        $html.=get_footer();

        return $html;
    }
}
