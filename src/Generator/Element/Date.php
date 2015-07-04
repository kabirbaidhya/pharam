<?php

namespace Pharam\Generator\Element;

class Date extends AbstractElement
{
    /**
     *
     * @return string Return HTML string output for date tag
     */
    public function getHtml()
    {
        $input = form_input('date', $this);
        return $input;
    }

}
