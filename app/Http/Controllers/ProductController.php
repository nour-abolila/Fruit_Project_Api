<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // هاتلى كل المنتجات وخلى بالك من id 
    public function getproducts($catid = null)
    {
        $products = Product::getAllProducts($catid);
        return view('frontend.products', compact('products'));
    }
    // اضافة منتج جديد 
    public function addproduct()
    {
        $categories = Category::all();
        return view('frontend.addproduct', compact('categories'));
    }

    public function storeproduct(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|string|min:3|max:255',
            'description' => 'required|string|min:5|max:1000',
            'price' => 'required|numeric|min:0.01',
            'category_id' => 'required|exists:categories,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // تخزين الصورة فى الستوراج جوة ملف البابليك
        $imagepath = $request->file('image')->store('products', 'public');


        $product = Product::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'category_id' => $validated['category_id'],
            'image' => 'storage/' . $imagepath,
        ]);

        // رسايل النجاح الاساسية انا بحطها فى الملف الماستر خلى بالك 
        return redirect()->back()->with('success', 'تم إضافة المنتج بنجاح!');
    }

    public function deleteproduct($id)
    {
        $products = Product::findOrFail($id);
        // هنا انا بخلية يمسح الصورة من فولدرات المشروع كمان
        if ($products->image && file_exists(public_path($products->image))) {
            unlink(public_path($products->image));
        }

        $products->delete();
        return redirect()->back()->with('success', 'تم حذف المنتج بنجاح!');
    }


    public function editproduct($id)
    {
        $product = Product::find($id);
        if ($product == null) {
            abort("403", "cant find product");
        }
        $categories = Category::all();
        return view('frontend.editproduct', compact('product'), compact('categories'));
    }

    public function updateproduct(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|min:3|max:255',
            'description' => 'required|string|min:5|max:1000',
            'price' => 'required|numeric|min:0.01',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // لو ملقاش صورة جديدة اضافت فالفورم اذا يحتفظ بالصورة القديمة عندة 
        if ($request->hasFile('image')) {

            if ($product->image && file_exists(public_path($product->image))) {
                unlink(public_path($product->image));
            }
            $imagepath = $request->file('image')->store('products', 'public');
            $product->image = 'storage/' . $imagepath;
        }

        $product->update([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'category_id' => $validated['category_id'],
            'image' => $product->image,
        ]);

        return redirect('/products')->with('success', 'تم تعديل المنتج بنجاح!');
    }
}
