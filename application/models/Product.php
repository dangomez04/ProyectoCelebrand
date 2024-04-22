<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Model {

    protected $table = 'products'; //TABLA DE LA BASE DE DATOS
    protected $primaryKey = 'id_product'; //LLAVE PRIMARIA DE LA TABLA
    public $timestamps = true; //TIMESTAMP DE LA TABLA - created_at y updated_at si está a false no cambiará las fechas de forma automática 

    protected $fillable = array( // CAMPOS DE LA TABLA QUE SE PUEDEN LLENAR
        'name',
        'description',
        'price',
        'id_category',
        
    );

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category');
    }


    public function get_all()

    {
        $products = $this->db->get($this->table)->result();

        foreach ($products as $product) {
            $product->category_name = $this->load_category_name($product->id_category);
        }
    
        return $products;



        
        
    }


    private function load_category_name($id_category){

        $this->db->select('name');
        $this->db->where('id_category', $id_category);
        $query = $this->db->get('categories'); 

      
        if ($query->num_rows() > 0) {

            $row = $query->row();
            return $row->name;

        } else {


            return 'Categoría no encontrada';
        }
    }


    function create($data){

        $insert_data = array(
            'name' => $data[0],
            'id_category' => $data[1],
            'price' => $data[2],
            'description' => $data[3]
        );

            $this->db->insert('products', $insert_data);
    
        
    }

    public function delete_product($id_product){
        $this->db->where('id_product', $id_product);

        $this->db->delete('products');
        
    }

    public function search_product($id_product){
        $this->db->where('id_product', $id_product);

        return $this->db->get($this->table)->row();

    }


   
    public function update_product($data){

        $this->db->where('id_product', $data['id_product']);
        $this->db->update($this->table, $data);
        
    }

}
