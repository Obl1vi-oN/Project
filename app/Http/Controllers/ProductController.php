<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::all();
        return view('index', ['products' => $product]);
    }
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('show', compact('product'));
    }
}
