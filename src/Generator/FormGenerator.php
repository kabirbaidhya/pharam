<?php

namespace Pharam\Generator;

use Illuminate\Filesystem\Filesystem;
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
        $html = $this->getPageHtml();

        $html = str_replace('${form}', $this->getFormHtml(), $html);;

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

    /**
     * Generates html for the Form
     *
     * @return string
     */
    protected function getFormHtml()
    {
        $form = new Wrapper('form');
        $html = $form->openTag();

        $hiddenFields = '';
        foreach ($this->getElements() as $element) {
            if (!($element instanceof Element\Hidden)) {
                $wrapper = new Wrapper('div', [$element->getLabel(), $element]);
                $html .= $wrapper->setAttributes([
                    'class' => 'form-group'
                ])->getHtml();

            } else {
                $hiddenFields .= $element->getHtml() . "\n";
            }
        }

        $html .= get_submit();
        $html .= $hiddenFields;
        $html .= $form->closeTag();

        return $html;
    }

    /**
     * Gets the default page template
     *
     * @return string
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    protected function getPageHtml()
    {
        /** @var Filesystem $fs */
        $fs = $this->getContainer()->make('filesystem');

        return $fs->get(__DIR__ . '/../Misc/stubs/default-page.html');
    }
}
