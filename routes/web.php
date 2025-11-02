<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CategoryController::class , 'getcategories'])->name('aaa');
Route::get('/categories', [CategoryController::class , 'filtercategory']);

Route::get('/products/{catid?}', [ProductController::class , 'getproducts'])->name('getproducts');
Route::get('/addproduct', [ProductController::class , 'addproduct'])->name('addproduct');
Route::post('/storeproduct', [ProductController::class , 'storeproduct'])->name('storeproduct');
Route::delete('/deleteproduct/{id}', [ProductController::class , 'deleteproduct'])->name('deleteproduct');
Route::get('/editproduct/{id}' , [ProductController::class , 'editproduct'])->name('editproduct');
Route::put('/updateproduct/{id}' , [ProductController::class , 'updateproduct'])->name('updateproduct');







Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
