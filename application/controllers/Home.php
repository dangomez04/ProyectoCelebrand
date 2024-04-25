<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . 'controllers/BaseController.php';

class Home extends BaseController
{

	public function __construct(array $params = array())
    {
        parent::__construct();

        $this->load->helper('language');

        $this->language = $this->uri->segment(1);
    
        

        $this->colour_mode = isset($this->session->colour_mode) ? $this->session->colour_mode : 'light';
        $this->session->set_userdata('colour_mode', $this->colour_mode);

          $this->view_data = array(
                       'language' => $this->language,
            'colour_mode' => $this->colour_mode,
        );
    }
    
	public function index()
	{
		$this->view_data["views"] = array("panel/home");
		$this->load->view('template', $this->view_data);
	}
}
