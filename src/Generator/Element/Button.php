<?php

namespace Pharam\Generator\Element;

/**
 * Button class
 */
class Button extends AbstractElement
{
    /**
     * Function to generate HTML tags for radio button.
     * @return string Return HTML string output for radio tag
     */
    public function getHtml()
    {
        $input = form_input('submit', $this);

        return $input;
    }

}
