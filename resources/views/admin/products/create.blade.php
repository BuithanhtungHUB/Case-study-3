@extends('admin.master')
@section('title', 'Create Product')
@section('content')
    <!-- Page body start -->
    <div class="page-body">
        <div class="row">
            <div class="col-sm-12">
                <!-- Basic Form Inputs card start -->
                <div class="card">
                    <div class="card-header">
                        <h2>Create Product</h2>
                        <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>
                        <div class="card-header-right"><i
                                class="icofont icofont-spinner-alt-5"></i></div>

                        <div class="card-header-right">
                            <i class="icofont icofont-spinner-alt-5"></i>
                        </div>

                    </div>
                    <div class="card-block">
                        <h4 class="sub-title">Basic Inputs</h4>
                        <form method="post" action="{{route('product.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Input Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror">
                                    @error('name')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Input Price</label>
                                <div class="col-sm-10">
                                    <input type="number" name="price" class="form-control @error('price') is-invalid @enderror">
                                    @error('price')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Bland</label>
                                <div class="col-sm-10">
                                    <select name="bland" class="form-control">
                                        @forelse($brands as $brand)
                                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                                        @empty
                                        <option>Brand</option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Category</label>
                                <div class="col-sm-10">
                                    <select name="category" class="form-control">
                                        @forelse($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @empty
                                        <option>Category</option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Upload File</label>
                                <div class="col-sm-10">
                                    <input type="file" name="image" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="description" placeholder="Discription">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success">Submit</button>
                            <a href="{{route('product.list')}}" class="btn btn-success">Back</a>
                        </form>
                    </div>
                </div>
                <!-- Basic Form Inputs card end -->
            </div>
        </div>
    </div>
    <!-- Page body end -->
@endsection
