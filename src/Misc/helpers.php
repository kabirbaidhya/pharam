<?php

if (!function_exists('human_readable')) {

    function human_readable($input)
    {
        $output = preg_replace(['/(?<=[^A-Z])([A-Z])/', '/(?<=[^0-9])([0-9])/'], ' $0', $input);
        $output = str_replace('_', ' ', $output);
        $output = ucwords($output);

        return $output;
    }

}

if (!function_exists('form_input')) {

    function form_input($type, $element)
    {
        $inputElement = '<input type="' . $type . "\"";
        $required = ($element->isRequired() && $type !== 'hidden') ? "required" : null;
        foreach ($element->getAttributes() as $key => $val) {
            if ($val == '') {
                continue;
            }
            $inputElement .= " " . $key . "=\"" . $val . "\"";
        }
        $inputElement .= " " . $required;
        $inputElement .= ">";

        return $inputElement;
    }

}

if (!function_exists('form_textarea')) {

    function form_textarea($element)
    {
        $inputElement = '<textarea';
        $required = $element->isRequired() ? "required" : null;
        foreach ($element->getAttributes() as $key => $val) {
            if ($val == '') {
                continue;
            }
            $inputElement .= " " . $key . "=\"" . $val . "\" ";
        }
        $inputElement .= $required;
        $inputElement .= "></textarea>";

        return $inputElement;
    }

}

if (!function_exists('form_select')) {

    function form_select($element)
    {
        $inputElement = '<select';
        $required = $element->isRequired() ? "required" : null;
        foreach ($element->getAttributes() as $key => $val) {
            if ($val == '') {
                continue;
            }
            $inputElement .= " " . $key . "=\"" . $val . "\" ";
        }
        $inputElement .= $required;
        $inputElement .= ">";
        $inputElement .= "<?php "
            . "\n// Fetch database data here \n"
            . "foreach(\$" . $element->getAttributes()['name'] . " as \$key=>\$val){\n"
            . "?>\n"
            . " <option values=\"<?php echo \$key;?>\"><?php echo \$val;?>"
            . " </option>\n"
            . "<?php } ?>";
        $inputElement .= "</select>";

        return $inputElement;
    }

}


if (!function_exists('get_submit')) {

    function get_submit()
    {
        $footer = ' <input type="submit" name="submit" id="submit" value="Submit"  />';

        return $footer;
    }

}
