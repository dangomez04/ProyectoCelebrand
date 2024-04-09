<?php

namespace Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories'; //TABLA DE LA BASE DE DATOS
    protected $primaryKey = 'id_category'; //LLAVE PRIMARIA DE LA TABLA
    public $timestamps = true; //TIMESTAMP DE LA TABLA - created_at y updated_at si está a false no cambiará las fechas de forma automática 

    protected $fillable = array( // CAMPOS DE LA TABLA QUE SE PUEDEN LLENAR
        'name',
    );
}
