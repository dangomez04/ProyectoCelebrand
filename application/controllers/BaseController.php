<?php

use Model\Auth;
use Model\User;

class BaseController extends CI_Controller
{
    protected $user;
    protected $language;
    protected $colour_mode;
    protected $panel_languages = ['en', 'es'];
    protected $view_data;

    public function __construct(array $params = array())
    {
        parent::__construct();

        $this->load->helper('language');

        $this->language = $this->uri->segment(1);
        if (!in_array($this->language, $this->panel_languages)) {
            $this->language = 'en';
        }

        $this->colour_mode = isset($this->session->colour_mode) ? $this->session->colour_mode : 'light';
        $this->session->set_userdata('colour_mode', $this->colour_mode);

        $this->user = new User();

        $logged = $this->user->checkAccess();

        if (!isset($params['auth_not_needed'])) {
            if (!$logged) {
                $this->logout();
            }
        }

        $this->view_data = array(
            'user' => $this->user,
            'language' => $this->language,
            'colour_mode' => $this->colour_mode,
        );
    }

/*     public function logout()
    {
        Auth::logout();
        redirect(APP_URL . $this->language);
    } */
}
