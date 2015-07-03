<?php

namespace Pharam\Generator\Element;


class Date extends AbstractElement
{

 public function getHtml()
    {
        $input = form_input('date', $this);
        return $input;
    }

}
