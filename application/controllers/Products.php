<?php
use application\models\Product;
use application\models\Category_model;


defined('BASEPATH') or exit('No direct script access allowed');

class Products extends CI_Controller
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

        $this->load->model('Product');
        $products = $this->Product->get_all();


        $this->view_data["views"] = array("products/index");
        
        $this->view_data["products"] = $products; 

		$this->load->view('template', $this->view_data);
	}


    public function new(){
        $this->load->model('Category_model');
        $categories = $this->Category_model->get_all();

        $this->view_data["views"] = array("products/create");

        $this->view_data["categories"] = $categories; 

        $this->load->view('template', $this->view_data);
    }


    public function create(){

        $this->load->model('Product');

        $name = $this->input->post('name');
        $id_category = $this->input->post('id_category');
        $price = $this->input->post('price');
        $description = $this->input->post('description');

        $data = array($name, $id_category, $price, $description);

        $this->Product->create($data);
        redirect('products');
    }



    
    public function delete($id_product){
        $this->load->model('Product');
        $this->Product->delete_product($id_product);
        redirect('products');

    }


    public function edit($id_product){
            $this->load->model('Product');
            $this->load->model('Category_model');

         


            $product_info = $this->Product->search_product($id_product);


            $this->view_data["views"] = array("products/edit");
            $this->view_data["product"] = $product_info; 
            $this->view_data["categories"] = $this->Category_model->get_all();; 

            $this->load->view('template', $this->view_data);




    }

    
    public function update(){
        $this->load->model('Product');

        $id_product = $this->input->post('id_product');
        $name = $this->input->post('name');
        $category = $this->input->post('id_category');
        $price = $this->input->post('price');
        $description = $this->input->post('description');

        $update_data = array(
            'id_product' => $id_product,
            'name' => $name,
            'id_category' => $category,
            'price' => $price, 
            'description' => $description

        );  

        $this->Product->update_product($update_data);
        redirect('products');

    }






}
