<?php

namespace Pharam\Generator\Element;

class TextArea implements ElementInterface
{

     protected $params;

    function __construct($params = array())
    {
        $this->params = $params;
    }

    public function getHtml()
    {
        // TODO: Implement getHtml() method.
       $input = " <textarea";
        if (is_array($this->params)) {
            foreach ($this->params as $key => $val) {
                if (strcmp($key, "value") == 0)
                    continue;
                $input.=" " . $key . "=\"" . $val . "\"";
            }
        }
        $input.=">" . $this->params['value'] . "</textarea>";

        return $input;
    }

    public function getName()
    {
        // TODO: Implement getName() method.
    }
}
