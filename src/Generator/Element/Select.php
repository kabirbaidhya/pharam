<?php

namespace Pharam\Generator\Element;

/**
 * Class Select to generate select html tag
 * @package Pharam\Generator\Element
 */
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
