<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;


Route::get('/products', function () {
$products = Product::all();
return view('index', ['products' => $products]);
});

Route::get('/product/{id}', [ProductController::class, 'show']);

Route::post('/order', [OrderController::class, 'store']);
