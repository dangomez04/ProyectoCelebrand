<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('notify')) {
    function notify($type, $msg, $page = false)
    {
        $CI = &get_instance();
        $CI->load->library('session');
        $CI->session->set_flashdata($type, $msg);
        if ($page) {
            switch ($page) {
                case 'same':
                    redirect(current_url());
                    break;

                case 'back':
                    redirect($_SERVER['HTTP_REFERER']);
                    break;

                default:
                    redirect($page);
                    break;
            }
        }
    }
}
