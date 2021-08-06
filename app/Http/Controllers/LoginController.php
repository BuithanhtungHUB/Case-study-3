<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showFormLogin()
    {
        return view('admin.login');
    }

    public function login(LoginRequest $request)
    {
       $email = $request ->email;
       $pasword = $request->password;

       $data = [
           'email' => $email,
           'password' =>$pasword
       ];

       if (Auth::attempt($data)) {
           return redirect()->route('product.list');
       }else{
           session()->flash('login_error', 'Account not exits!');
           return redirect()->route('admin.showFromlogin');
       }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.showFromlogin');
    }

}
