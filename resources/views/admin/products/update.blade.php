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
                        <h2>Update Product</h2>
                    </div>
                    <div class="card-block">
                        <form method="post" action="{{route('product.update',$product->id)}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Input Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" value="{{$product->name}}" class="form-control @error('name') is-invalid @enderror">
                                    @error('name')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Input Price</label>
                                <div class="col-sm-10">
                                    <input type="number" name="price" value="{{$product->price}}" class="form-control @error('price') is-invalid @enderror">
                                    @error('price')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Bland</label>
                                <div class="col-sm-10">
                                    <select name="brand" class="form-control">
                                        @forelse($brands as $brand)
                                            {{$brand->id}}
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
                                    <input class="form-control" value="{{$product->description}}"  name="description"  placeholder="Discription">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success">Submit</button>
                            <a href="{{route('product.list')}}" class="btn btn-secondary">Back</a>
                        </form>
                    </div>
                </div>
                <!-- Basic Form Inputs card end -->
            </div>
        </div>
    </div>
    <!-- Page body end -->
@endsection

