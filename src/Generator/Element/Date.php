<?php

namespace Pharam\Generator\Element;

/**
 * Class Date
 * @package Pharam\Generator\Element
 */
class Date extends AbstractElement
{
    /**
     * Function to generate HTML tag for date field
     * @return string Return HTML string output for date tag
     */
    public function getHtml()
    {
        $input = form_input('date', $this);
        return $input;
    }

}
