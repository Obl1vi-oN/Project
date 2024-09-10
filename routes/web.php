<?php
use App\Models\Product;
use Illuminate\Support\Facades\Route;


Route::get('/products', function () {
$products = Product::all();
return view('index', ['products' => $products]);
});
