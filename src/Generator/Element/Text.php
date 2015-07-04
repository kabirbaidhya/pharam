<?php

namespace Pharam\Generator\Element;


class Text extends AbstractElement
{
 /**
     *
     * @return string Return HTML string output for text tag
     */
    public function getHtml()
    {
        $input = form_input('text', $this);
        return $input;
    }

}
