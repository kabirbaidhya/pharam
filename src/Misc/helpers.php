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

    function form_input($input, $element)
    {
        $inputElement = '<input type="' . $input . "\"";
        $required = $element->isRequired() ? "required" : null;
        foreach ($element->getAttributes() as $key => $val) {
            if ($val == '')
                continue;
            $inputElement.=" " . $key . "=\"" . $val . "\"";
        }
        $inputElement.=" " . $required;
        $inputElement.=">";
        return $inputElement;
    }

}

if (!function_exists('form_textarea')) {

    function form_textarea($element)
    {
        $inputElement = '<textarea';
        $required = $element->isRequired() ? "required" : null;
        foreach ($element->getAttributes() as $key => $val) {
            if ($val == '')
                continue;
            $inputElement.=" " . $key . "=\"" . $val . "\" ";
        }
        $inputElement.=$required;
        $inputElement.="></textarea>";
        return $inputElement;
    }

}

if (!function_exists('form_select')) {

    function form_select($element)
    {
        $inputElement = '<select';
        $required = $element->isRequired() ? "required" : null;
        foreach ($element->getAttributes() as $key => $val) {
            if ($val == '')
                continue;
            $inputElement.=" " . $key . "=\"" . $val . "\" ";
        }
        $inputElement.=$required;
        $inputElement.=">";
        $inputElement.="<?php "
                . "//Here comes to fetch the database data"
                . "foreach(\$" . $element->getAttributes()['name'] . " as \$key=>\$val){"
                . "?>"
                . " <option values=\"<?php echo \$key;?>\"><?php echo \$val;?>"
                ." </option>"
                . "<?php }?>";
        $inputElement.="</select>";
        return $inputElement;
    }

    }


    if (!function_exists('get_submit')) {

    function get_submit()
    {

        $footer = '<div class="group">
            <input type="submit" name="submit" id="submit" value="Submit"  />
        </div>';

        return $footer;
    }

}

if (!function_exists('get_footer')) {

    function get_footer()
    {

        $footer = '</body>
</html>';

        return $footer;
    }

}

if (!function_exists('get_header')) {

    function get_header()
    {

        $footer = '<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>PHARAM</title>
</head>
<body>';

        return $footer;
    }

}

if (!function_exists('get_container')) {

    function get_container($element)
    {

        $label = $element->isRequired() ? "*" : null;
        $containerOutput = '<div class="group">
            <label>' . $element->getLabel() . $label . '</label>
            <div class="controls">';
        $containerOutput.=$element->getHtml();
        $containerOutput .=' </div>
        </div>';

        return $containerOutput;
    }

}