<?php

namespace Pharam\Generator\Element;


class Boolean extends AbstractElement
{
 /**
     *
     * @return string Return HTML string output for radio tag
     */
    public function getHtml()
    {
        $input = form_input('radio', $this);
        $input .= " Yes";
        $input .= form_input('radio', $this);
        $input .= "No";

        return $input;
    }

}
