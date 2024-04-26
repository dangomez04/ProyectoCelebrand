<?php

use Model\{
    Product,
    Category,
};

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

        $products = Product::get_products();

        $this->view_data["views"] = array("products/index");
        
        $this->view_data["products"] = $products; 

		$this->load->view('template', $this->view_data);
	}


    public function new(){
      
        $this->view_data["views"] = array("products/create");
        
        $categories = Category::get_categories();
        $this->view_data["categories"] = $categories;

		$this->load->view('template', $this->view_data);



    }


    public function create(){
        $name = $this->input->post('name');
        $description = $this->input->post('description');
        $price = $this->input->post('price');
        $id_category = $this->input->post('id_category');
        
        $data = array(
            'name' => $name,
            'description' => $description,
            'price' => $price,
            'id_category' => $id_category
        );    
        Product::create_products($data);
        redirect("products");


    }



    
    public function delete($id_product){

            $product = new Product();
            $product->delete_product(['id_product' => $id_product]);
            redirect("products");


    }


    public function edit($id_product){
       
        $this->view_data["views"] = array("products/edit");
        
        

        $product = Product::search_product(['id_product' => $id_product]);
        $this->view_data["product"] = $product;
        
        $categories = Category::get_categories();
        $this->view_data["categories"] = $categories;




		$this->load->view('template', $this->view_data);

    }

    
    public function update(){

        $name = $this->input->post('name');
        $id_category = $this->input->post('id_category');
        $price = $this->input->post('price');
        $description = $this->input->post('description');
        $id_product = $this->input->post('id_product');

        $data = array(
            'name' => $name,
            'id_category' => $id_category,
            'price' => $price,
            'description' => $description,
            'id_product' => $id_product
        );

        $product =  Product::update_product($data);
        redirect("products");
        
    }






}
