<?php

namespace Pharam\Generator\Element;


class Email extends AbstractElement
{
   public function getHtml()
    {
        $input = form_input('email', $this);
        return $input;
    }

}
