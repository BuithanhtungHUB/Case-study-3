<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sign Up</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="description" content="CodedThemes">
    <meta name="keywords"
          content=" Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="CodedThemes">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <!-- Favicon icon -->
    <link rel="icon" href="{{asset('assets/images/favicon.ico')}}" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap/css/bootstrap.min.css')}}">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/icon/themify-icons/themify-icons.css')}}">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/icon/icofont/css/icofont.css')}}">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
</head>
<body class="fix-menu">
<!-- Pre-loader start -->
<div class="theme-loader">
    <div class="ball-scale">
        <div class='contain'>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
            <div class="ring">
                <div class="frame"></div>
            </div>
        </div>
    </div>
</div>
<!-- Pre-loader end -->
<section class="login p-fixed d-flex text-center bg-primary common-img-bg">
    <!-- Container-fluid starts -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <!-- Authentication card start -->
                <div class="signup-card card-block auth-body mr-auto ml-auto">
                    <form action="{{route('users.store')}}" method="post" class="md-float-material">
                        @csrf
                        <div class="auth-box">
                            <div class="row m-b-20">
                                <div class="col-md-12">
                                    <h3 class="text-center txt-primary">Create An Acount</h3>
                                </div>
                            </div>
                            <hr/>
                            <div class="mt-3">
                                <input name="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                       placeholder="Username">
                                @error('name') <p class="text-danger">{{$message}}</p> @enderror
                                <span class="md-line"></span>
                            </div>
                            <div class="mt-3">
                                <input name="email" type="email"
                                       class="form-control @error('email') is-invalid @enderror"
                                       placeholder="Your Email Address">
                                @error('email') <p class="text-danger">{{$message}}</p> @enderror
                                <span class="md-line"></span>
                            </div>
                            <div class="mt-3">
                                <div class="input-group" id="show_hide_password">
                                    <input name="password" class="form-control @error('password') is-invalid @enderror"
                                           type="password" placeholder="Choose Password">
                                    <div class="input-group-addon">
                                        <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                @error('password') <p class="text-danger">{{$message}}</p> @enderror
                                <span class="md-line"></span>
                            </div>
                            <div class="mt-3">
                                <div class="input-group" id="show_hide_confirm_password">
                                    <input name="password_confirm" type="password"
                                           class="form-control @error('password_confirm') is-invalid @enderror"
                                           placeholder="Confirm Password">
                                    <div class="input-group-addon">
                                        <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                @error('password_confirm') <p class="text-danger">{{$message}}</p> @enderror
                                <span class="md-line"></span>
                            </div>

                            <div class="row m-t-30">
                                <div class="col-md-12">
                                    <button type="submit"
                                            class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">
                                        Sign up now.
                                    </button>
                                </div>
                            </div>
                            <hr/>

                        </div>
                    </form>
                    <!-- end of form -->
                </div>
                <!-- Authentication card end -->
            </div>
            <!-- end of col-sm-12 -->
        </div>
        <!-- end of row -->
    </div>
    <!-- end of container-fluid -->
</section>


<!-- Required Jquery -->
<script type="text/javascript" src="{{asset('assets/js/jquery/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/jquery-ui/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/popper.js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="{{asset('assets/js/jquery-slimscroll/jquery.slimscroll.js')}}"></script>
<!-- modernizr js -->
<script type="text/javascript" src="{{asset('assets/js/modernizr/modernizr.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/modernizr/css-scrollbars.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/common-pages.js')}}"></script>
<script src="{{asset('assets/js/login.js')}}"></script>

</body>


</html>
