<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH . 'controllers/BaseController.php';

class Home extends BaseController
{
	public function index()
	{
		$this->view_data["views"] = array("panel/home");
		$this->load->view('template', $this->view_data);
	}
}
