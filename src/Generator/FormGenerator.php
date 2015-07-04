<?php

namespace Pharam\Generator;

use Pharam\Generator\Element\Wrapper;

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
        $hiddenFields = '';

        foreach ($this->getElements() as $element) {
            if (!($element instanceof Element\Hidden)) {
                $wrapper = new Wrapper('div', [$element->getLabel(), $element]);
                $wrapper->setAttributes(['class' => 'form-group']);
                $html .= $wrapper->getHtml();
            } else {
                $hiddenFields .= $element->getHtml() . "\n";
            }
        }
        $html .= get_submit($hiddenField);
        $html .= $hiddenFields;
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
