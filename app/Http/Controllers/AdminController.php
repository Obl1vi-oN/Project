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

    /*
    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $order->status = $request->input('status');
        $order->save();

        return redirect('/admin')->with('success', 'Статус успешно изменен');
    }
    */
    public function statusNew(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        if ($order->status == "Новый") {
            if ($order->product->amount >= $order->quantity) {
                $order->status = "Одобрено";
                $order->product->amount -= $order->quantity;
                $order->product->save();
                $order->save();
                return redirect('/admin')->with('success', 'Статус заказа успешно обновлен.');
            }
            return redirect('/admin')->with('error', 'Недостаточное количество товара на складе.');
        }
        return redirect('/admin')->with('error', 'Невозможно изменить статус.');
    }

    public function statusApproved(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        if ($order->status == "Одобрено") {
            $order->status = "Доставлено";
            $order->save();
            return redirect('/admin')->with('success', 'Статус заказа успешно обновлен.');
        }
        return redirect('/admin')->with('error', 'Невозможно изменить статус.');
    }
}
