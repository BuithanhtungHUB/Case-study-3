<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::orDerBy('updated_at','DESC')->paginate(5);
        return view('admin.brands.list',compact('brands'));
    }

    public function create()
    {
        return view('admin.brands.create');

    }

    public function store(Brand $brand, CreateBrandRequest $request)
    {
        $brand->name = $request->name;
        $brand->save();
        toastr()->success('Thêm mới thành công');
        return redirect()->route('brand.list');
    }

    public function edit($id)
    {
        $brand = Brand::findOrFail($id);

        return view('admin.brands.update', compact('brand'));
    }

    public function update(UpdateBrandRequest $request, $id)
    {
        $brand = Brand::findOrFail($id);
        $brand->name = $request->name;
        $brand->save();
        toastr()->success('Update mới thành công');
        return redirect()->route('brand.list');
    }

    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->products()->delete();
        $brand->delete();
        toastr()->success('Xóa thàng công');
        return redirect()->route('brand.list');

    }
}
