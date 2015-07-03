<?php

namespace Pharam\Generator\Element;


class Text extends AbstractElement
{
 
     public function getHtml()
    {
        $input = form_input('text', $this);
        return $input;
    }

}
