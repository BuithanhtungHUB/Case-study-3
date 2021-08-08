<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Requests\UpdateProductRequest;
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
            $path ='images/r5z7GE2rr4jlGNVTCStsQj40BDBl7Ebx3qVgnzNL.jpg';
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

    public function update(UpdateProductRequest $request,$id)
    {
        $product = Product::findOrFail($id);
        if (!$request->hasFile('image')){
            $path = $product->image;
        }else{
            $path = $request->file('image')->store('images','public');
        }
        $product->image = $path;
        $product->name = $request->name;
        $product->price = $request->price;
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

    public function search($input)
    {
        if (!empty($input)){
            $value = $input;
            $products = Product::where('name', 'LIKE', '%' . $value . '%')->get();
        }else {
            $products = Product::all();
        }
        return response()->json($products);
    }

    public function filterCategory($id)
    {
        $products = Product::where('category_id','LIKE','%'.$id.'%')->get();
        return response()->json($products);
    }
    public function filterBrand($id)
    {
        $products = Product::where('brand_id','LIKE','%'.$id.'%')->get();
        return response()->json($products);
    }

    public function detailProduct($id)
    {
        $product = Product::findOrFail($id);
        $brand =$product->brand->name;
        $category = $product->category->name;
        $data = [
            'product'=>$product,
            'brand'=>$brand,
            'category'=>$category

        ];
        return response()->json($data);
    }

    public function getList()
    {
        $products = Product::all();
        return response()->json($products);
    }

    public function filterPrice($last)
    {
        $value = $last;
        $products = Product::where([['price','>',0],['price','<=',$value]])->get();
        return response()->json($products);
    }
}
