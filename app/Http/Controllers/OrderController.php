<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $orders = Order::with(['orderItems.product'])->paginate(10);
    //     return view('orders.index', ['orders' => $orders]);
    // }

    public function index()
    {
        $query = Order::with(['orderItems.product', 'customer'])
            ->latest();

        // Apply filters
        if (request('status')) {
            $query->where('status', request('status'));
        }

        if (request('search')) {
            $query->where(function ($q) {
                $q->where('reference', 'like', '%' . request('search') . '%')
                    ->orWhereHas('customer', function ($q) {
                        $q->where('name', 'like', '%' . request('search') . '%');
                    });
            });
        }

        // Advanced filters
        if (request('from_date')) {
            $query->whereDate('created_at', '>=', request('from_date'));
        }

        if (request('to_date')) {
            $query->whereDate('created_at', '<=', request('to_date'));
        }

        if (request('customer_id')) {
            $query->where('customer_id', request('customer_id'));
        }

        if (request('min_amount')) {
            $query->where('amount', '>=', request('min_amount'));
        }

        if (request('max_amount')) {
            $query->where('amount', '<=', request('max_amount'));
        }

        $orders = $query->paginate(10);



        $totalOrders = Order::where('created_at', '>=', now()->subDays(30))
            ->count();

        $completedOrders = Order::where('status', 'paid')
            ->where('created_at', '>=', now()->subDays(30))
            ->count();

        $pendingOrders = Order::where('status', 'pending')
            ->where('created_at', '>=', now()->subDays(30))
            ->count();

        $cancelledOrders = Order::where('status', 'cancelled')
            ->where('created_at', '>=', now()->subDays(30))
            ->count();

        // Get customers for filter dropdown
        $customers = User::whereHas('orders')->get(['id', 'name']);

        return view('orders.index', [
            'orders' => $orders,
            'totalOrders' => $totalOrders,
            'completedOrders' => $completedOrders,
            'pendingOrders' => $pendingOrders,
            'cancelledOrders' => $cancelledOrders,
            'customers' => $customers
        ]);
    }



    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    public function fulfillModal(Order $order)
    {
        $order->load(['orderItems.product', 'customer']);

        return view('orders.partials.fulfill-modal', compact('order'));
    }

    public function fulfill(Order $order)
    {
        $validated = request()->validate([
            'shipping_method' => 'required|string',
            'tracking_number' => 'nullable|string',
            'fulfillment_notes' => 'nullable|string',
            'notify_customer' => 'boolean'
        ]);

        // Update order status
        $order->update([
            'status' => 'completed',
            'fulfilled_at' => now(),
            'shipping_method' => $validated['shipping_method'],
            'tracking_number' => $validated['tracking_number'],
            'notes' => $validated['fulfillment_notes']
        ]);

        // Notify customer if selected
        if (request('notify_customer', false)) {
            // Send fulfillment notification email
            // Mail::to($order->email)->send(new OrderFulfilled($order));
        }

        return response()->json([
            'success' => true,
            'order' => $order
        ]);
    }

    public function cancel(Order $order)
    {
        $validated = request()->validate([
            'reason' => 'required|string',
            'notes' => 'nullable|string',
            'notify_customer' => 'boolean'
        ]);

        // Update order status
        $order->update([
            'status' => 'cancelled',
            'cancelled_at' => now(),
            'cancellation_reason' => $validated['reason'],
            'notes' => $validated['notes']
        ]);

        // Notify customer if selected
        if (request('notify_customer', false)) {
            // Send cancellation notification email
            // Mail::to($order->email)->send(new OrderCancelled($order));
        }

        return response()->json([
            'success' => true,
            'order' => $order
        ]);
    }
}
