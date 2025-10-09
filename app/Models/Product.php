<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','description','image','price','category_id'];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public static function getAllProducts($catid = null)
    {
       if($catid){
        $products = Product::where('category_id' , $catid)->get();
        return $products ;
       }
       else
       {
        return self::all();
       }
    }
}
