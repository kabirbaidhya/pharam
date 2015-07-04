<?php

namespace Pharam\Generator\Element;


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
