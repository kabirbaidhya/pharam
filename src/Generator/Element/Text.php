<?php

namespace Pharam\Generator\Element;


class Text extends AbstractElement
{

     protected $params;

    function __construct($params = array())
    {
        $this->params = $params;
    }

    public function getHtml()
    {
        // TODO: Implement getHtml() method.
        $input = '<input type="text"';
        if (is_array($this->params)) {
            foreach ($this->params as $key => $val) {
                if (strcmp($key, 'class') == 0 && $val == '')
                    continue;
                $input.=" " . $key . "=\"" . $val . "\"";
            }
        }
        $input .= " />";
        return $input;
    }

}
