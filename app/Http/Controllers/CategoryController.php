<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('admin.admin_add_category');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

      $table = new category();

         // ✅ Image upload
        $file=$request->file('image');
        $filename=time()."_img.".$request->file('image')->getClientOriginalExtension(); //"125455565656_img.jpg"
        $file->move('uploads/categories/',$filename); // upload image in public
        $table->image=$filename;

        $table->name=$request->name;
        $table->product_count=$request->product_count;
        $table->save();
        return redirect()->route('admin.admin_manage_categories')->with('success', 'Category added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(category $category)
    {
          $categories = category::all();
        return view('admin.admin_manage_categories', compact('categories'));
          
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = category::findOrFail($id);
        return view('admin.admin_edit_category', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $category = category::findOrFail($id);
        
        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = time()."_img.".$file->getClientOriginalExtension();
            $file->move('uploads/categories/', $filename);
            
            if($category->image && file_exists(public_path('uploads/categories/'.$category->image))){
                unlink(public_path('uploads/categories/'.$category->image));
            }
            $category->image = $filename;
        }

        $category->name = $request->name;
        if($request->has('product_count')) {
            $category->product_count = $request->product_count;
        }
        $category->save();

        return redirect()->route('admin.admin_manage_categories')->with('success', 'Category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = category::findOrFail($id);
        if($category->image && file_exists(public_path('uploads/categories/'.$category->image))){
            unlink(public_path('uploads/categories/'.$category->image));
        }
        $category->delete();
        return redirect()->back()->with('success', 'Category deleted successfully!');
    }
}
