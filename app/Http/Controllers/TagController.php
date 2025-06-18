<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::all();
        return view('category.tag', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
    {

         $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $cat = Tag::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        noty()->success('Category created.');
        return redirect()->back();
    }

    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $updCat = $tag->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        noty()->success('Tag Updated.');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();

        noty()->success('Tag deleted.');
        return redirect()->back();
    }

}
