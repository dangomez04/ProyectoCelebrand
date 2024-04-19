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

    

}
