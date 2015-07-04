<?php

namespace Pharam\Generator\Element;

/**
 * Class Boolean to generate Yes No Radio html Tag
 * @package Pharam\Generator\Element
 */
class Boolean extends AbstractElement
{
     /**
     * Function to generate HTML tags for radio button.
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
