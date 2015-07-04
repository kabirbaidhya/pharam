<?php

namespace Pharam\Generator\Element;
/**
 * Class Email to generate Email field html Tag
 * @package Pharam\Generator\Element
 */
class Email extends AbstractElement
{
    /**
     * Function to generate HTML tag for email field
     * @return string Return HTML string output for email tag
     */
    public function getHtml()
    {
        $input = form_input('email', $this);
        return $input;
    }

}
