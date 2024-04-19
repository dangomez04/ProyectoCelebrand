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

        // Cargar nombres de categorías para cada producto
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

}
