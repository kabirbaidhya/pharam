<?php

namespace Pharam\Generator\Element;

class DateTime extends AbstractElement
{
    /**
     *
     * @return string Return HTML string output for datetime tag
     */
    public function getHtml()
    {
        $input = form_input('datetime', $this);
        return $input;
    }

}
