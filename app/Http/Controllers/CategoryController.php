<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        $categories = DB::table('categories')->get();
        $categories = Category::all();
//        return view('categories', ['categories' => $categories]);
        return view('categories', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category-form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:15',
            'description' => 'nullable|max:50'
        ]);
        Category::create([
           'name' => $request->name,
           'description' => $request->description
        ]);

        return redirect()->route('category.index');
//        return redirect('/admin');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('category-view', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('category-edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
       $category->update([
          'name' => $request->name,
          'description' => $request->description
       ]);

       return redirect('/admin');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect('/admin');

    }
}
