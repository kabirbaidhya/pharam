<?php

namespace Pharam\Generator\Element;


class Select extends AbstractElement
{

    /**
     *
     * @return string Return HTML string output for select tag
     */
    public function getHtml()
    {
          $input = form_select($this);
        return $input;
    }

}
