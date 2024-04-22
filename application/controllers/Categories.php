<?php
use application\models\Category_model;

defined('BASEPATH') or exit('No direct script access allowed');

class Categories extends CI_Controller
{

	public function __construct(array $params = array())
    {
        parent::__construct();

        $this->load->helper('language');

        $this->language = $this->uri->segment(1);
    
            $this->language = 'es';
        

        $this->colour_mode = isset($this->session->colour_mode) ? $this->session->colour_mode : 'light';
        $this->session->set_userdata('colour_mode', $this->colour_mode);

          $this->view_data = array(
                       'language' => $this->language,
            'colour_mode' => $this->colour_mode,
        );


    }
	public function index()
	{

        $this->load->model('Category_model');
        $categories = $this->Category_model->get_all();


        $this->view_data["views"] = array("categories/index");

        $this->view_data["categories"] = $categories; 

		$this->load->view('template', $this->view_data);
	}


    public function new(){
        $this->view_data["views"] = array("categories/create");
		$this->load->view('template', $this->view_data);
    }

    public function create(){
        $this->load->model('Category_model');

        $name = $this->input->post('name');
        $this->Category_model->create(['name' => $name]);
        redirect('categories');


    }



    public function delete($id_category){
        $this->load->model('Category_model');
         $this->Category_model->delete_category($id_category);
        redirect('categories');            
        
    }


    public function edit($id_category){
        $this->load->model('Category_model');
    
        $category_info = $this->Category_model->search_category($id_category);
    
      
    
        $this->view_data["views"] = array("categories/edit");
        $this->view_data["category_info"] = $category_info; 
        $this->load->view('template', $this->view_data);
    }
    


    public function update(){
        $this->load->model('Category_model');

        $id_category = $this->input->post('id_category');
        $name = $this->input->post('name');


        $update_data = array(
            'name' => $name,
            'id_category' => $id_category

        );  

        $this->Category_model->update_category($update_data);
        redirect('categories');

    }








}
