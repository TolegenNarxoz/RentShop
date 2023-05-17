<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return view('categories.index', ['categories' => $categories]);
    }


    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'code' => 'required|max:5',
        ]);
        Category::create($validated);
        return redirect()->route('categories.create')->with('addcategory', 'Category add');
    }


//    public function show(Category $category)
//    {
//        //
//    }
//
//
//    public function edit(Category $category)
//    {
//        //
//    }
//
//
//    public function update(Request $request, Category $category)
//    {
//        //
//    }


    public function destroy(Category $category)
    {
        $category->delete();
        return back();
    }
}
