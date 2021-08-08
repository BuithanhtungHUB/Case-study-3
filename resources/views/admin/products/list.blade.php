@extends('admin.master')
@section('title', 'Product List')
@section('content')
    <div class="main-body">
        <div class="page-wrapper">
            <!-- Page-header start -->
            <div class="page-header card">
                <div class="row align-items-end">
                    <div class="col-lg-8">
                        <div class="page-header-title">
                            <i class="icofont icofont-table bg-c-blue"></i>
                            <div class="d-inline">
                                <h4>List Product</h4>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Page-header end -->

            <!-- Page-body start -->
            <div class="page-body">
                <!-- Hover table card start -->
                <div class="card">

                    <div class="card-block table-border-style">
                                                    <a href="{{route('product.create')}}" class="btn btn-success">Add New</a>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Brand</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Description</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($products as $key => $product)
                                <tr>
                                    <th scope="row">{{$key+1}}</th>
                                    <td><img src="{{asset('storage/'.$product->image)}}" style="width: 100px; height: 100px"></td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->brand->name}}</td>
                                    <td>{{$product->category->name}}</td>
                                    <td>{{$product->price}}</td>
                                    <td>{{$product->description}}</td>
                                    <td><a href="{{route('product.edit',$product->id)}}" class="btn btn-warning">Edit</a></td>
                                    <td><a href="{{route('product.delete',$product->id)}}" class="btn btn-danger" onclick="return confirm('Bạn chắc chắn muốn xóa')">Delete</a></td>
                                </tr>
                                @empty
                                    <tr><td colspan="9">No Data</td></tr>
                                @endforelse
                                </tbody>
                            </table>
{{--                            {{$poducts->links()}}--}}
                            {!! $products->links() !!}
                        </div>
                    </div>
                </div>
                <!-- Hover table card end -->

            </div>
            <!-- Page-body end -->
        </div>
    </div>
@endsection
