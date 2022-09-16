<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\Category;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

use Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(5);
        return view('backend.category.create', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('backend.category.index');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name' =>'required|unique:categories',

        ]);

        Category::insert([
            'category_name' => $request->category_name,
            'category_slug' => Str::slug($request->category_name),
            'category_description' => $request->category_description,
        ]);
        Toastr::error('Category Created Successfull', 'category', ["positionClass" => "toast-top-center"]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category )
    {


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $id = $category->id;

        $ShowCategory = Category::find($id);
        return view('backend.category.edit', compact('ShowCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $category_id = $category->id;
       $category_name = $request->category_name;
       $category_description = $request->category_description;
// echo $category_id.$category_name.$category_description;
        $request->validate([
            'category_name' =>'required|unique:categories',

        ]);

       Category::find($category_id)->update([
        'category_name' => $category_name,
        'category_slug' => Str::slug($category_name),
        'category_description' => $category_description,
       ]);
       return redirect()->route('category.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {

        $id = $category->id;
        Category::find($id)->delete();
        return back();
    }
}
