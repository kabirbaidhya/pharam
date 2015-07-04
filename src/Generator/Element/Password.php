<?php

namespace Pharam\Generator\Element;

/**
 * Class Password to generate password type html tag
 * @package Pharam\Generator\Element
 */
class Password extends AbstractElement
{
    /**
     *
     * @return string Return HTML string output for password tag
     */
    public function getHtml()
    {
        $input = form_input('password', $this);
        return $input;
    }

}
