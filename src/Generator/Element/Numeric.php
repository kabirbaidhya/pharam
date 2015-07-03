<?php

namespace Pharam\Generator\Element;


class Numeric extends AbstractElement
{

     public function getHtml()
    {
        $input = form_input('number', $this);
        return $input;
    }

}
