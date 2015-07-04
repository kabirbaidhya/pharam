<?php

namespace Pharam\Generator;

use Illuminate\Filesystem\Filesystem;
use Pharam\Generator\Element\Button;
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
        $enableBootstrapCss = $this->getContainer()['config']['form']['use_bootstrap'];
        if ($enableBootstrapCss) {
            $html = str_replace('${csslink}', $this->generateHeaderLink(), $html);
        }
        $html = str_replace('${form}', $this->getFormHtml(), $html);

        return $this->formatHtml($html);
    }

    /*
     * Create the bootstrapcss
     * @return string
     */

    protected function generateHeaderLink()
    {
        return "<link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css\">";
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
        $template = $this->getTemplate();
        $form = $template->getFormWrapper();

        $heading = human_readable($this->getMapper()->getTableName());

        $html = '<h1 class="text-center">' . $heading . ' Form </h1>';
        $html .= $form->openTag();

        $hiddenFields = '';
        foreach ($this->getElements() as $element) {
            if (!($element instanceof Element\Hidden)) {
                $element->setAttribute('class', $template->getInputClass());
                $element->getLabel()->setAttribute('class', $template->getLabelClass());
                $row = $template->getInputRowWrapper();
                $inputWrapper = $template->getInputWrapper();
                $inputWrapper->setElements([$element]);

                $row->setElements([$element->getLabel(), $inputWrapper]);


                $html .= $row->getHtml();

            } else {
                $hiddenFields .= $element->getHtml() . "\n";
            }
        }

        $row = $template->getInputRowWrapper();
        $row->setElements([
            new Button([
                'name' => 'submit',
                'id' => 'submit-button',
                'value' => 'Submit',
                'class' => $template->getSubmitButtonClass() . ' pull-right'
            ])
        ]);

        $html .= $row->getHtml();
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
