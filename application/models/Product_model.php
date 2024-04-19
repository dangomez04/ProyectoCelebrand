<?php

namespace Model;

use Illuminate\Database\Eloquent\Model;

class Product_model extends Model
{
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
        return $this->db->get($this->table)->result();
    }
}
