<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('admin.products.list',compact('products'));
    }

    public function create()
    {
        $brands = Brand::all();
        $categories = Category::all();
        return view('admin.products.create',compact('brands','categories'));
    }

    public function store(Product $product,CreateProductRequest $request)
    {
        if (!$request->hasFile('image')){
            $path ='';
        }else{
            $path = $request->file('image')->store('images','public');
        }
        $product->name = $request->name;
        $product->image = $path;
        $product->price = $request->price;
        $product->category_id = $request->category;
        $product->brand_id = $request->brand;
        $product->description = $request->description;
        $product->save();
        return redirect()->route('product.list');

    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $brands = Brand::all();
        $categories = Category::all();
        return view('admin.products.update',compact('product','brands','categories'));
    }

    public function update(Product $product,UpdateCategoryRequest $request,$id)
    {
        if (!$request->hasFile('image')){
            $product = Product::findOrFail($id);
            $path = $product->image;
        }else{
            $path = $request->file('image')->store('images','public');
        }
        $product->image = $path;
        $product->name = $request->name;
        $product->peice = $request->price;
        $product->category_id = $request->category;
        $product->brand_id = $request->brand;
        $product->description = $request->description;
        $product->save();
        return redirect()->route('product.list');

    }

    public function destroy($id)
    {
        $product =Product::findOrFail($id);
        $product->delete();
        return redirect()->route('product.list');

    }
}
