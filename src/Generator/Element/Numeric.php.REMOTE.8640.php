<?php

namespace Pharam\Generator\Element;


class Numeric implements ElementInterface
{

    protected $params;

    function __construct($params = array())
    {
        $this->params = $params;
    }

    public function getHtml()
    {
        // TODO: Implement getHtml() method.
        $input = '<input type="number"';
        if (is_array($this->params)) {
            foreach ($this->params as $key => $val) {
                $input.=" " . $key . "=\"" . $val . "\"";
            }
        }
        $input . " />";
        return $input;
    }

    public function getName()
    {
        // TODO: Implement getName() method.
    }

}
