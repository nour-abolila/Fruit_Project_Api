<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // مسموح بكتابة الاعمدة دى فالجدول فالداتا بيز
    protected $fillable = ['name', 'description', 'image', 'price', 'category_id'];

    // العلاقة بين جدول الكاتيجورى والبروداكت
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // هات كل المنتجات من جدول البروداكت
    public static function getAllProducts($catid = null)
    {
        if ($catid) {
            $products = Product::where('category_id', $catid)->get();
            return $products;
        } else {
            return self::all();
        }
    }
}
