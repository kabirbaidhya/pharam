<?php

namespace Pharam\Generator\Element;


class Boolean extends AbstractElement
{
 
     public function getHtml()
    {
        $input = form_input('boolean', $this);
        return $input;
    }

}
