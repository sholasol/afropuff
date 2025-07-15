<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with(['categories', 'tags', 'featuredImage'])
                    ->inRandomOrder()
                    ->paginate(9);

        return view('home.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function about()
    {
        return view('home.about');
    }

    public function support()
    {
        return view('home.support');
    }

    public function refer()
    {
        return view('home.refer');
    }

    public function talk()
    {
        return view('home.talk');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function search(Request $request)
    {
        return view('home.search');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        
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
