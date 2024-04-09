<?php

require_once APPPATH . "controllers/BaseController.php";

class Ajax extends BaseController
{
    public function switchTheme()
    {
        $actual_mode = $this->input->post('actual_mode');
        if ($actual_mode == 'light') {
            $this->session->set_userdata('colour_mode', 'dark');
        } else {
            $this->session->set_userdata('colour_mode', 'light');
        }

        echo $this->session->colour_mode;
    }
}
