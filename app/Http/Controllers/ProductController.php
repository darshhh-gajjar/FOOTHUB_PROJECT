<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
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
        $categories = \App\Models\category::all();
        return view('admin.admin_add_product', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = new product();
        $product->brand_name = $request->brand_name;
        $product->name = $request->name;
        $product->sale_price = $request->sale_price;
        $product->mrp = $request->mrp;
        $product->stock = $request->stock;
        $product->category_id = $request->category_id;
        $product->color = $request->color;
        
        if($request->has('sizes')){
            $product->sizes = json_encode($request->sizes);
        }

        $product->upper_material = $request->upper_material;
        $product->sole_material = $request->sole_material;
        $product->closure = $request->closure;
        $product->fit = $request->fit;
        $product->description = $request->description;
        
        $images = [];
        if($request->hasFile('images')){
            foreach($request->file('images') as $file){
                $filename = time().'_'.uniqid().'.'.$file->getClientOriginalExtension();
                $file->move('uploads/products/', $filename);
                $images[] = $filename;
            }
        }
        $product->images = json_encode($images);
        
        $product->status = 'Active';

        $product->save();

        return redirect()->route('admin.admin_manage_products')->with('success', 'Product added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        // Join with category or just use eloquent relationships if defined. 
        // We can just fetch all products and manually find the category name in the view or using join.
        $products = product::leftJoin('categories', 'products.category_id', '=', 'categories.id')
                    ->select('products.*', 'categories.name as category_name')
                    ->get();
        return view('admin.admin_manage_products', compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = product::findOrFail($id);
        $categories = \App\Models\category::all();
        return view('admin.admin_edit_product', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $product = product::findOrFail($id);
        
        $product->brand_name = $request->brand_name;
        $product->name = $request->name;
        $product->sale_price = $request->sale_price;
        $product->mrp = $request->mrp;
        $product->stock = $request->stock;
        $product->category_id = $request->category_id;
        $product->color = $request->color;
        
        if($request->has('sizes')){
            $product->sizes = json_encode($request->sizes);
        } else {
            $product->sizes = null;
        }

        $product->upper_material = $request->upper_material;
        $product->sole_material = $request->sole_material;
        $product->closure = $request->closure;
        $product->fit = $request->fit;
        $product->description = $request->description;
        
        if($request->hasFile('images')){
            $images = [];
            foreach($request->file('images') as $file){
                $filename = time().'_'.uniqid().'.'.$file->getClientOriginalExtension();
                $file->move('uploads/products/', $filename);
                $images[] = $filename;
            }
            // Optionally delete old images
            if($product->images){
                $old_images = json_decode($product->images, true);
                if(is_array($old_images)){
                    foreach($old_images as $old_image){
                        if(file_exists(public_path('uploads/products/'.$old_image))){
                            unlink(public_path('uploads/products/'.$old_image));
                        }
                    }
                }
            }
            $product->images = json_encode($images);
        }

        if($request->has('status')){
            $product->status = $request->status;
        }

        $product->save();

        return redirect()->route('admin.admin_manage_products')->with('success', 'Product updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = product::findOrFail($id);
        $product->delete();
        return redirect()->back()->with('success', 'Product deleted successfully!');
    }
}
