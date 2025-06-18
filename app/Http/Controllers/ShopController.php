<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with(['categories', 'tags','images', 'variants' ])
                ->inRandomOrder()
                ->paginate(16);
        return view('shop.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function singleProduct(Product $product)
    {
        $product = Product::with(['categories', 'tags','images', 'variants' ])
                ->where('id', $product->id)->first();
        
               

        $prods = Product::with(['categories', 'tags','images', 'variants' ])
                ->inRandomOrder()
                ->limit(4)
                ->get();

        return view('shop.product', ['product' =>$product, 'prods' => $prods]);
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
