<?php
namespace Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories'; //TABLA DE LA BASE DE DATOS
    protected $primaryKey = 'id_category'; //LLAVE PRIMARIA DE LA TABLA
    public $timestamps = false; //TIMESTAMP DE LA TABLA - created_at y updated_at si está a false no cambiará las fechas de forma automática 

    protected $fillable = array( // CAMPOS DE LA TABLA QUE SE PUEDEN LLENAR
        'name',
    );

    
    public static function get_categories($conditions=[]){
        $categories = Self::where($conditions)->get();
        if (empty($categories)) {
            $categories = Self::all();
        }
        return $categories;
    }

    public static function search_category($cond=[]){
        $category = Self::where($cond)->first();
        return $category;
    }


    public static function create_category($name){
        Self::create(['name' => $name]);
    }


    public function delete_category($id_category){
        $category = Self::where($id_category)->first();
        $category->delete();

    }

    public static function update_category($data){
        $category = Category::find();
    }



}
