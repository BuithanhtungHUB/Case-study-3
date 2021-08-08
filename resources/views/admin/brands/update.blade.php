@extends('admin.master')
@section('title', 'Update Brand')
@section('content')
    <!-- Page body start -->
    <div class="page-body">
        <div class="row">
            <div class="col-sm-12">
                <!-- Basic Form Inputs card start -->
                <div class="card">
                    <div class="card-header">
                        <h2>Update Bland</h2>

                    </div>
                    <div class="card-block">
                        <form method="post" action="{{route('brand.update',$brand->id)}}">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Simple Input</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" value="{{$brand->name}}" class="form-control @error('name') is-invalid @enderror">
                                    @error('name')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                         <button type="submit" class="btn btn-success">Submit</button>
                         <a href="{{route('brand.list')}}" class="btn btn-secondary">Back</a>
                        </form>
                    </div>
                </div>
                <!-- Basic Form Inputs card end -->
            </div>
        </div>
    </div>
    <!-- Page body end -->
@endsection

