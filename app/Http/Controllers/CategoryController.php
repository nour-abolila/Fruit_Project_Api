<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getcategories()
    {
        $categories = Category::getAllCategories();
        return view('frontend.welcome', compact('categories'));
    }

    // بجيب هنا كل الاقسام الخاصة بالكاتيجورى معين
    public function filtercategory()
    {
        $categories = Category::getAllCategories();
        $products = Product::getAllProducts();
        return view('frontend.categories', compact('categories', 'products'));
    }
}
