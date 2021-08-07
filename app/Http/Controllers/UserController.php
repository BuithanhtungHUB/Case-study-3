<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\StoreUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function showDashboard() {
        return view('admin.dashboard');
    }

    function create() {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    function index() {
        $users = User::orDerBy('id','DESC')->paginate(20);
        return view('admin.users.list', compact('users'));
    }

    function store(User $user, RegisterRequest $request)
    {
        if(!$request->hasFile('image')){
            $path = $path ='images/r5z7GE2rr4jlGNVTCStsQj40BDBl7Ebx3qVgnzNL.jpg';
        }else{
            $path = $request->file('image')->store('images','public');
        }
        // tao users
//        $user = new User();
        $user->name = $request->name;
        $user->image = $path;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role_id = 2;
        $user->save();
        return redirect()->route('admin.showFromlogin');

        //them role users
//        $user->roles()->sync($request->roles);
//        session()->flash('add_success', 'Add new users successfully!');

    }

    public function edit($id)
    {

        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('admin.users.update', compact('user','roles'));
    }

    public function update(Request $request, User $user, $id)
    {
        if (!$request->hasFile('image')){
            $user = User::findOrFail($id);
            $path = $user->image;
        }else{
            $path = $request->file('image')->store('image','public');
        }
//
        $users = User::findOrFail($id);
        $password = $users->password;
        $user->name = $request->name;
        $user->image = $path;
        $user->email = $request->email;
        $user->password =$password;
        $user->role_id = $request->role;
        $user->save();
        return redirect()->route('users.index');
    }

    function delete($id){

        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index');
    }
}
