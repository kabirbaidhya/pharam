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
