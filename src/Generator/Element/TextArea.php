<?php

namespace Pharam\Generator\Element;

class TextArea extends AbstractElement
{
    public function getHtml()
    {
        $input = form_textarea($this);
        return $input;
    }

}
