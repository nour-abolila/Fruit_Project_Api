<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'image'];

    // الاقسام ممكن تكون بدخلها منتجات العلاقات بينهم
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    // دى دالة كلين كود بستدعيها افضل فى الكنترولر
    public static function getAllCategories()
    {
        return self::all();
    }
}
