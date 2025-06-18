<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('category.category', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $cat = Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        noty()->success('Category created.');
        return redirect()->back();
    }

    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $updCat = $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        noty()->success('Category Updated.');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        noty()->success('Category deleted.');
        return redirect()->back();
    }





}
