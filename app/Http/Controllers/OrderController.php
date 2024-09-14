<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($request->product_id);

        Order::create([
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'total_cost' => $product->cost * $request->quantity,
        ]);

        return redirect('/products')->with('success', 'Ваш заказ был успешно оформлен.');
    }
}
