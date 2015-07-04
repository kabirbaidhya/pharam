<?php

namespace Pharam\Generator\Element;
/**
 * Class Label to generate Hidden html tag
 * @package Pharam\Generator\Element
 */
class Hidden extends AbstractElement
{
    /**
     *
     * @return string Return HTML string output for email tag
     */
    public function getHtml()
    {
        $input = form_input('hidden', $this);

        return $input;
    }

}
