<?php

namespace Pharam\Generator\Element;

/**
 * Class TextArea to generate textarea html tag
 * @package Pharam\Generator\Element
 */
class TextArea extends AbstractElement
{

    /**
     *
     * @return string Return HTML string output for textarea tag
     */
    public function getHtml()
    {
        $input = form_textarea($this);
        return $input;
    }

}
