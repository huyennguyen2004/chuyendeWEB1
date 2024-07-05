<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {

        $list = Order::all();
        return view('backend.order.index', compact('list'));
    }
    public function show($id)
    {
        $order = Order::with('orderDetails')->findOrFail($id);
        return view('backend.order.show', compact('order'));
    }
    public function status($id)
    {
        $order = Order::findOrFail($id);
        $order->status = !$order->status;
        $order->save();

        return redirect()->route('admin.order.index');
    }

    public function delete($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        return redirect()->route('admin.order.index');
    }

    public function trash()
    {
        $list = Order::onlyTrashed()->orderBy('deleted_at', 'DESC')->get();
        return view('backend.order.trash', compact('list'));
    }
    public function restore(Request $request, $id)
    {
        $order = Order::onlyTrashed()->findOrFail($id);
        $order->restore();
        return redirect()->route('admin.order.trash');
    }
    public function destroy(string $id)
    {
        $order = Order::findOrFail($id);
        $order->forceDelete();
        return redirect()->route('admin.order.index');
    }
}
