<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return to index view category.index
        $categories = Category::orderBy('id', 'desc')->get();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return to create view category.create
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // save data to database category.store

        $request->validate([
            "title" => "required|max:255|unique:categories",
            "nep_title" => "required",
        ]);

        $category = new Category();
        $category->title = $request->title;
        $category->nep_title = $request->nep_title;
        $category->slug = Str::slug($request->title);

        $category->save();

        toast('Record saved successfully!', 'success');


        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // view single data
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // return to edit view category.edit
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // update data in database

        $request->validate([
            "title" => "required|max:255|unique:categories,title,$id",
            "nep_title" => "required",
        ]);

        $category = Category::find($id);
        $category->title = $request->title;
        $category->nep_title = $request->nep_title;
        $category->slug = Str::slug($request->title);

        $category->update();
        toast('Record Updated successfully!', 'success');


        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // delete data from database

        $category = Category::find($id);
        $category->delete();
        toast('Record deleted successfully!', 'success');
        return redirect()->back();
    }
}
