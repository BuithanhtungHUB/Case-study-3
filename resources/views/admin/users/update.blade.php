@extends('admin.master')
@section('title','Update User')
@section('content')
    <!-- Page body start -->
    <div class="page-body">
        <div class="row">
            <div class="col-sm-12">
                <!-- Basic Form Inputs card start -->
                <div class="card">
                    <div class="card-header">
                        <h2>Create Category</h2>
                        <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>
                        <div class="card-header-right"><i
                                class="icofont icofont-spinner-alt-5"></i></div>

                        <div class="card-header-right">
                            <i class="icofont icofont-spinner-alt-5"></i>
                        </div>

                    </div>
                    <div class="card-block">
                        <h4 class="sub-title">Edit User</h4>
                        <form method="post" action="{{route('users.update',$user->id)}}"  enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name"  value="{{$user->name}}" class="form-control " readonly>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" name="email" value="{{$user->email}}" class="form-control " readonly>
                                </div>
                            </div>
{{--                            <div class="form-group row">--}}
{{--                                <label class="col-sm-2 col-form-label">Password</label>--}}
{{--                                <div class="col-sm-10">--}}
{{--                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">--}}
{{--                                    @error('password')--}}
{{--                                    <p class="text-danger">{{$message}}</p>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group row">--}}
{{--                                <label class="col-sm-2 col-form-label"></label>--}}
{{--                                <div class="col-sm-10">--}}
{{--                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror">--}}
{{--                                    @error('name')--}}
{{--                                    <p class="text-danger">{{$message}}</p>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Image</label>
                                <div class="col-sm-10">
                                    <img src="{{asset('storage/'.$user->image)}}" alt="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-form-label">Role</label>
                                @foreach($roles as $role)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="role" id="inlineRadio1" value="{{$role->id}}">
                                    <label class="form-check-label">{{$role->name}}</label>
                                </div>

                                @endforeach


                            </div>
                            <button type="submit" class="btn btn-success">Submit</button>
                            <a href="{{route('users.index')}}" class="btn btn-success">Back</a>
                        </form>
                    </div>
                </div>
                <!-- Basic Form Inputs card end -->
            </div>
        </div>
    </div>
    <!-- Page body end -->
@endsection
