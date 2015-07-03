<?php

namespace Pharam\Generator\Element;

class TextArea extends AbstractElement
{

     protected $params;

    function __construct($params = array())
    {
        $this->params = $params;
        print_r($this->params);
    }

    public function getHtml()
    {
        // TODO: Implement getHtml() method.
       $input = " <textarea";
        if (is_array($this->params)) {
            foreach ($this->params as $key => $val) {
                 if (strcmp($key, 'class') == 0 && $val == '')
                    continue;
                $input.=" " . $key . "=\"" . $val . "\"";
            }
        }
        $input.="></textarea>";

        return $input;
    }

  
}
