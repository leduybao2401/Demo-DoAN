<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //

    public function index()
    {
        $order = Order::where('status', '0')->get();
        return view('admin.orders.index', compact('order'));
    }
    public function view($id)
    {
        $order = Order::where('id', $id)->first();
        return view('admin.orders.view', compact('order'));
    }
    public function updateOrder(Request $request, $id)
    {
        $order = Order::find($id);
        $order->status = $request->input('order_status');
        $order->update();
        return redirect('order')->with('status', "Order update successfully");
    }
    public function orderhistory()
    {
        $order = Order::where('status', '1')->get();
        return view('admin.orders.history', compact('order'));
    }
}
