<?php

namespace Pharam\Generator;

/**
 * Class FormGenerator
 * Default Form Generator
 * @package Pharam\Generator
 */
class FormGenerator extends AbstractFormGenerator
{
    /**
     * Generates final HTML forms elements.
     * @return string
     */
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
