@extends('admin.master')
@section('title', 'Brand List')
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
                                <h4>List Brand</h4>
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
                        <div class="table-responsive">
                            <a href="{{route('brand.create')}}" class="btn btn-success">Add New</a>
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Name</th>
                                    <th>Edit</th>
                                    <th>Delete</th>

                                </tr>
                                </thead>
                                <tbody>
                                @forelse($brands as $key => $brand)
                                <tr>
                                    <th scope="row">{{$key+1}}</th>
                                    <td>{{$brand->name}}</td>
                                    <td><a href="{{route('brand.edit',$brand->id)}}" class="btn btn-warning">Edit</a></td>
                                    <td><a href="{{route('brand.delete',$brand->id)}}" onclick="return confirm('Bạn chắc chắn muốn xóa')" class="btn btn-danger">Delete</a></td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">No Data</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                            {!! $brands->links() !!}
                        </div>
                    </div>
                </div>
                <!-- Hover table card end -->

            </div>
            <!-- Page-body end -->
        </div>
    </div>
@endsection

