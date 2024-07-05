<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the category.
     */
    public function index()
    {
        $categories = Category::get();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new category.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created category in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3'
        ]);

        Category::create([
            'name' => $request->name,
        ]);


        toastr()->success('Category Created Successfully.');
        return redirect()->route('admin.category.index');
    }

    /**
     * Display the specified category.
     */
    public function show(Category $category)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified category.
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified category in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|min:3'
        ]);

        $category->name = $request->name;
        $category->save();

        toastr()->success('Category Updated Successfully.');
        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified category from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        toastr()->info('Category Deleted.');
        return redirect()->route('admin.category.index');
    }
}
