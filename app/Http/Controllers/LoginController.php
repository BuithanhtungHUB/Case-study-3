<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class LoginController extends Controller
{
    public function showFormLogin()
    {
        return view('admin.login');
    }

    public function showDashboard()
    {
        return view('admin.dashboard');

    }

    public function login(LoginRequest $request)
    {

       $email = $request ->email;
       $password = $request->password;

       $data = [
           'email' => $email,
           'password' =>$password,
       ];

       if (Auth::attempt($data)) {

           if (!Gate::allows('loginAdmin')){
               return redirect()->route('shop.home');
           }
           toastr()->success('Đăng nhập thành công');
           return redirect()->route('admin.dashboard');

       }else{
           toastr()->error('Đăng nhập thất bại');
           return redirect()->route('admin.showFromlogin');
       }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('shop.home');
    }

}
