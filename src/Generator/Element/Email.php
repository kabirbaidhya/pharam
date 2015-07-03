<?php

namespace Pharam\Generator\Element;


class Email extends AbstractElement
{

     protected $params;

    function __construct($params = array())
    {
        $this->params = $params;
    }

    public function getHtml($params = array())
    {
        // TODO: Implement getHtml() method.
        $input = '<input type="email"';
        if (is_array($this->params)) {
            foreach ($this->params as $key => $val) {
                $input.=" " . $key . "=\"" . $val . "\"";
            }
        }
        $input . " />";
        return $input;
    }

}