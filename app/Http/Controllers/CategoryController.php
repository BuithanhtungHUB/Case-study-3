<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orDerBy('updated_at','DESC')->paginate(5);
        return view('admin.category.list',compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');

    }

    public function store(Category $category, CreateCategoryRequest $request)
    {
        $category->name = $request->name;
        $category->save();
        toastr()->success('Thêm mới thành công');
        return redirect()->route('category.list');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.update', compact('category'));
    }

    public function update(UpdateCategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->save();
        toastr()->success('Update thành công');
        return redirect()->route('category.list');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->products()->delete();
        $category->delete();
        toastr()->success('Xóa thành công');
        return redirect()->route('category.list');

    }
}
