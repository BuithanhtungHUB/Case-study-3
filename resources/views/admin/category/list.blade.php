@extends('admin.master')
@section('title', 'Category List')
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
                                <h4>List Category</h4>
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
                            <a href="{{route('category.create')}}" class="btn btn-success">Add New</a>
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
                                @forelse($categories as $key => $category)
                                    <tr>
                                        <th scope="row">{{$key+1}}</th>
                                        <td>{{$category->name}}</td>
                                        <td><a href="{{route('category.edit',$category->id)}}" class="btn btn-warning">Edit</a></td>
                                        <td><a href="{{route('category.delete',$category->id)}}" onclick="return confirm('Bạn chắc chắn muốn xóa')" class="btn btn-danger">Delete</a></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">No Data</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                            {!! $categories->links() !!}
                        </div>
                    </div>
                </div>
                <!-- Hover table card end -->

            </div>
            <!-- Page-body end -->
        </div>
    </div>
@endsection

