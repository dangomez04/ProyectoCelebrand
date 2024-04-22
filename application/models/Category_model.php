<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model {

    protected $table = 'categories'; //TABLA DE LA BASE DE DATOS
    protected $primaryKey = 'id_category'; //LLAVE PRIMARIA DE LA TABLA
    public $timestamps = true; //TIMESTAMP DE LA TABLA - created_at y updated_at si está a false no cambiará las fechas de forma automática 

    protected $fillable = array( // CAMPOS DE LA TABLA QUE SE PUEDEN LLENAR
        'name',
    );


    public function get_all()
    {
        return $this->db->get($this->table)->result();
    }


    public function create($data){
        $this->db->insert('categories', $data);

    }


    public function delete_category($id_category){
        $this->db->where('id_category', $id_category);

        $this->db->delete('categories');
        
    }



    public function search_category($id_category){
        $this->db->where('id_category', $id_category);

        return $this->db->get($this->table)->row();

    
    }


    public function update_category($data){

        $this->db->where('id_category', $data['id_category']);
        $this->db->update($this->table, $data);
        
    }

    

    

}
