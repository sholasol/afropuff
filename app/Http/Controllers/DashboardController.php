<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalOrders = Order::where('created_at', '>=', now()->subDays(30))
        ->count();

        $revenue = Order::where('status', 'paid')
        ->where('created_at', '>=', now()->subDays(30))
         ->sum('amount');

        $products = Product::count();

        $customers = User::where('role', 'CUS')
         ->count();

         $orders = Order::with(['orderItems.product', 'customer'])
         ->get();
        
        return view('admin.index',
        [
            'orders' => $orders,
            'totalOrders' => $totalOrders,
            'revenue' => $revenue,
            'products' => $products,
            'customers' => $customers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function customers()
    {
        $customers = User::where('role', 'CUS')
            ->paginate(10);

        return view('admin.customer', ['customers' => $customers]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
