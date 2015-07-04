<?php

namespace Pharam\Generator\Element;

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
