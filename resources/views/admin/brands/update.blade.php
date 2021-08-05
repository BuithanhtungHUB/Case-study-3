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
                        <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>
                        <div class="card-header-right"><i
                                class="icofont icofont-spinner-alt-5"></i></div>

                        <div class="card-header-right">
                            <i class="icofont icofont-spinner-alt-5"></i>
                        </div>

                    </div>
                    <div class="card-block">
                        <h4 class="sub-title">Basic Inputs</h4>
                        <form method="post" action="{{route('brand.update',$brand->id)}}">
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
                         <a href="{{route('brand.list')}}" class="btn btn-success">Back</a>
                        </form>
                    </div>
                </div>
                <!-- Basic Form Inputs card end -->
            </div>
        </div>
    </div>
    <!-- Page body end -->
@endsection

