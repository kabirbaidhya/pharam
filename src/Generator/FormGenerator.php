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

        return $this->formatHTML($html);
    }

    protected function formatHTML($html)
    {
        $config = $this->getContainer()['config']['tidy'];
        $tidy = $this->getContainer()['tidy'];
        $tidy->parseString($html, $config, 'utf8');
        $tidy->cleanRepair();

        return $tidy;
    }

}
