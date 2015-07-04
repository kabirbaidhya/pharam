<?php

namespace Pharam\Generator;

/**
 * Class FormGenerator
 * Default Form Generator
 *
 * @package Pharam\Generator
 */
class FormGenerator extends AbstractFormGenerator
{

    /**
     * Generates final HTML forms elements.
     *
     * @return string
     */
    public function generate()
    {
        $html = get_header();
        $html .= "<form>";
        $hiddenField = null;

        foreach ($this->getElements() as $element) {
            if (!($element instanceof Element\Hidden)) {
                $html .= get_container($element);
            } else {
                $hiddenField .= $element->getHtml();
            }
        }
        $html .= get_submit($hiddenField);
        $html .= "</form>";
        $html .= get_footer();

        return $this->formatHtml($html);
    }

    protected function formatHtml($html)
    {
        $formatter = $this->getContainer()->make('formatter');

        return $formatter->HTML($html);
    }
}
