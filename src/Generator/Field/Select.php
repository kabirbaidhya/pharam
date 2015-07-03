<?php

namespace Pharam\Generator\Field;

class Select implements FieldInterface
{
 protected $params;

    function __construct($params = array())
    {
        $this->params = $params;
    }

    public function getHtml()
    {
        // TODO: Implement getHtml() method.
        $input = " <select";
        if (is_array($this->params)) {
            foreach ($this->params as $key => $val) {
                if (strcmp($key, "value") == 0)
                    continue;
                $input.=" " . $key . "=\"" . $val . "\"";
            }
        }
        $input.=">";
        if (is_array($this->params['value'])) {
            foreach ($this->params['value'] as $key => $val) {
                $input.="<option value=\"" . $key . "\">" . $val . "</option>";
            }
        }
        $input.="</select>";

        return $input;
    }

    public function getName()
    {
        // TODO: Implement getName() method.
    }

}
