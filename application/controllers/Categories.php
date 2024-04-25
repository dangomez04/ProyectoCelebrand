<?php

use Model\{
    Category,
};

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


      $categories = Category::get_categories();
      

      $this->view_data["views"] = array("categories/index");

      $this->view_data["categories"] = $categories; 

	  $this->load->view('template', $this->view_data);


	}


    public function new(){

        $this->view_data["views"] = array("categories/create");


	  $this->load->view('template', $this->view_data);

    }

    public function create(){
        $name = $this->input->post('name');
        Category::create_category($name);
        redirect("categories");

    }



    public function delete($id_category){
        $category = new Category();
        $category->delete_category(['id_category'=>$id_category]);

    redirect("categories");
    }


    public function edit($id_category){
        $category_founded = Category::search_category(['id_category' => $id_category]);
   

        $this->view_data["views"] = array("categories/edit");

        $this->view_data["category_info"] = $category_founded; 
  
        $this->load->view('template', $this->view_data);
    }
    


    public function update(){
        $id_category = $this->input->post('id_category');
        $name = $this->input->post('name');
        
        Category::update_category($id_category, $name);
        redirect("categories");
    }


}
