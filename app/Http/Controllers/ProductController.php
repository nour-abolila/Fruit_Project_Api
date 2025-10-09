<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
  
    public function index($catid = null)
    {
        $products = Product::getAllProducts($catid);
        return view ('frontend.products' , compact('products'));
    }


}
