<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin(Request $request)
    {
        $orders = Order::with('product', 'user')->get();

        return view('admin', ['orders' => $orders]);
    }

    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $order->status = $request->input('status');
        $order->save();

        return redirect('/admin')->with('success', 'Статус успешно изменен');
    }
}
