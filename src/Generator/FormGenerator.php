<?php

namespace Pharam\Generator;

/**
 * Default Form Generator
 */
class FormGenerator extends AbstractFormGenerator
{

    public function generate()
    {
        $html = get_header();
        $html.="<form>";
        foreach ($this->getElements() as $element) {
            $html .= get_container($element);
        }
        $html.=get_submit();
        $html.="</form>";
        $html.=get_footer();

        return $html;
    }
}
