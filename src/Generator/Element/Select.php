<?php

namespace Pharam\Generator\Element;


class Select extends AbstractElement
{
    public function getHtml()
    {
          $input = form_select($this);
        return $input;
    }

}
