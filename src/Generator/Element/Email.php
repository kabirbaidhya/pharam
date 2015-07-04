<?php

namespace Pharam\Generator\Element;

class Email extends AbstractElement
{
    /**
     *
     * @return string Return HTML string output for email tag
     */
    public function getHtml()
    {
        $input = form_input('email', $this);
        return $input;
    }

}
