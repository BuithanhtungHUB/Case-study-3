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
    function create() {

        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    function store(RegisterRequest $request) {

        // tao users
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role_id = 2;
        $user->save();

        //them role users
//        $user->roles()->sync($request->roles);
        session()->flash('add_success', 'Add new users successfully!');
        return redirect()->route('admin.showFromlogin');

    }

    function index() {
        $users = User::orDerBy('id','DESC')->paginate(20);
        return view('admin.users.list', compact('users'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('admin.users.update', compact('user','roles'));
    }

    public function update(Request $request, User $user, $id)
    {
        $users = User::findOrFail($id);
        $path = $users->image;
        $password = $users->password;
        $user->name = $request->name;
        $user->image = $path;
        $user->email = $request->email;
        $user->password =$password;
        $user->role_id = $request->role;

        $user->save();
    }

    function delete($id){

        $user = User::findOrFail($id);
        $user->delete();
        return response()->json(['message' => __('message.delete_success')]);
    }
}
