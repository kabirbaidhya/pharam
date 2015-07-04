<?php

namespace Pharam\Generator\Element;
/**
 * Class DateTime
 * @package Pharam\Generator\Element
 */
class DateTime extends AbstractElement
{
    /**
     * Function to generate HTML tag for datetime field
     * @return string Return HTML string output for datetime tag
     */
    public function getHtml()
    {
        $input = form_input('datetime', $this);
        return $input;
    }

}
