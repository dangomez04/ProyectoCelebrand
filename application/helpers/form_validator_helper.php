<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('validateForm')) {
    function validateForm($rules, $lang)
    {
        $CI = &get_instance();
        $CI->load->library('form_validation');

        $CI->form_validation->set_message('required', 'The field %s is required.');
        $CI->form_validation->set_message('integer', 'The field %s must be an integer.');
        $CI->form_validation->set_message('in_list', "The value of field %s isn't valid");
        $CI->form_validation->set_message('valid_email', 'El email debe tener el formato example@example.com');
        $CI->form_validation->set_message('min_length', 'El campo %s tiene que tener un mínimo de %d carácteres');
        $CI->form_validation->set_message('matches', 'Los campos contraseñas deben coincidir');
        $CI->form_validation->set_message('max_length', 'El campo %s no puede superar el máximo de %d carácteres');

        foreach ($rules as $key => $rule) {
            if (isset($rule[3])) {
                $CI->form_validation->set_rules($rule[0], $rule[1], $rule[2], $rule[3]);
            } else {
                $CI->form_validation->set_rules($rule[0], $rule[1], $rule[2]);
            }
            $CI->session->set_flashdata($rule[0], $CI->input->post($rule[0]));
        }

        //true or false
        return $CI->form_validation->run();
    }
}
