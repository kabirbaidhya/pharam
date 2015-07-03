<?php

namespace Pharam\Generator\Element;

class Radio extends AbstractElement
{

    public function getHtml()
    {
        $input = form_input('radio', $this);
        $input .= " Yes";
        $input .= form_input('radio', $this);
        $input .= "No";

        return $input;
    }

}