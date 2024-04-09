<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('replaceVariablesInText')) {
    /** *
     * @var variables debe ser un array asociativo con el nombre de la variable y su valor para
     * @var text es el string donde queremos sustituir las variables
     */
    function replaceVariablesInText($variables, $text)
    {
        foreach ($variables as $key => $value) {
            $text = str_replace("{{" . $key . "}}", "$value", $text);
        }
        return $text;
    }
}

if (!function_exists('loadViews')) {
    /**
     * @param array\views_to_load es el array con la infomación que queremos encriptar
     */
    function loadViews($views_to_load)
    {
        $CI = &get_instance();
        foreach ($views_to_load as $key => $view) {
            $CI->load->view($view);
        }
    }
}
