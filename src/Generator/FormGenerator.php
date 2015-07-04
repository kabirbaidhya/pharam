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
     * Generates the form
     *
     * @return string
     */
    public function generate()
    {
        $html = get_header();
        $html .= "<form>";
        $hiddenField = '';

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

    /**
     * Format and prettify the html output
     *
     * @param $html
     * @return mixed
     */
    protected function formatHtml($html)
    {
        $formatter = $this->getContainer()->make('formatter');

        return $formatter->html($html);
    }
}
