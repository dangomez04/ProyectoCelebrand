<?php

namespace Model;

use Illuminate\Database\Eloquent\Model;

class Product_image extends Model
{
    protected $table = 'product_images'; //TABLA DE LA BASE DE DATOS
    protected $primaryKey = 'id_product_image'; //LLAVE PRIMARIA DE LA TABLA
    public $timestamps = false; //TIMESTAMP DE LA TABLA - created_at y updated_at si está a false no cambiará las fechas de forma automática 

    protected $fillable = array( // CAMPOS DE LA TABLA QUE SE PUEDEN LLENAR
        'id_product',
        'type',
        'src',
    );

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product');
    }
}
