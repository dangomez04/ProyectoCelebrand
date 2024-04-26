<?php

namespace Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products'; //TABLA DE LA BASE DE DATOS
    protected $primaryKey = 'id_product'; //LLAVE PRIMARIA DE LA TABLA
    public $timestamps = false; //TIMESTAMP DE LA TABLA - created_at y updated_at si está a false no cambiará las fechas de forma automática 

    protected $fillable = array( // CAMPOS DE LA TABLA QUE SE PUEDEN LLENAR
        'name',
        'description',
        'price',
        'id_category',
        
    );

 
    public function category(){
        return $this->belongsTo(Category::class, 'id_category');
    }

    public static function get_products(){
        $products = Self::all();
        return $products;
    }

    public static function create_products($data=[]){
        Self::create($data);

    }

    public static function search_product($id_product){
        $product = Self::where($id_product)->first();
        return $product;

    }


    public function delete_product($id_product){
        $category = Self::where($id_product)->first();
         
        $category->delete();

    }

    public static function update_product($data){
        $product = Self::find($data['id_product']);

        if($product){
            $product->update([
                
                'name' => $data['name'],
                 'id_category' => $data['id_category'],
                  'description' => $data['description'],
                   'price' => $data['price']
            
            
            
            ]);

        }


    }
    




}
