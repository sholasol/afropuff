<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        $recentOrders = Order::where('customer_id', $user->id)
                            ->orderBy('created_at', 'desc')
                            ->take(3)
                            ->get();

        return view('customer.dashboard', [
            'user' => $user,
            'recentOrders' => $recentOrders
        ]);
    }

    public function orders()
    {
        $user = Auth::user();
        $orders = Order::where('customer_id', $user->id)
                      ->orderBy('created_at', 'desc')
                      ->paginate(10);

        return view('customer.orders', [
            'user' => $user,
            'orders' => $orders
        ]);
    }

    public function orderDetails(Order $order)
    {
        if ($order->customer_id !== Auth::id()) {
            abort(403);
        }

        // $order->load('items.product');
        $order->load('orderItems.product');

        return view('customer.order-details', [
            'user' => Auth::user(),
            'order' => $order
        ]);
    }
}