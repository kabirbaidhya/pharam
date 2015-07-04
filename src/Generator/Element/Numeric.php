<?php

namespace Pharam\Generator\Element;

/**
 * Class Numeric to generate number type html tag
 * @package Pharam\Generator\Element
 */
class Numeric extends AbstractElement
{
    /**
     *
     * @return string Return HTML string output for numeric tag
     */
    public function getHtml()
    {
        $input = form_input('number', $this);
        return $input;
    }

}
