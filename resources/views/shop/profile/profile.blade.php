@extends('shop.master')
@section('title','Profile User')
@section('content')
<section id="aa-myaccount">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="aa-myaccount-area">
                    <div class="row">
                        <form method="post" action="{{route('user.editProfile',$user->id)}}" class="aa-login-form" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-6">
                                <img src="{{asset('storage/'.auth()->user()->image)}}" style="width: 300px;height: 300px">
                                <input type="file" name="image">
                            </div>
                            <div class="col-md-6">
                                <div class="aa-myaccount-login">
                                    <h4>Profile</h4>
                                    <label>User Name<span>*</span></label>
                                    <input type="text" name="name" value="{{auth()->user()->name}}" placeholder="Username">
                                    <label>Email<span>*</span></label>
                                    <input type="text" name="email" value="{{auth()->user()->email}}" readonly>
{{--                                    <label>Password<span>*</span></label>--}}
{{--                                    <input type="text" value="{{auth()->user()->password}}" name="password" placeholder="Password">--}}
                                    <button type="submit" class="btn btn-danger">Update</button>
                                    <button class="btn btn-secondary"><a href="{{route('shop.list')}}">Back</a></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
