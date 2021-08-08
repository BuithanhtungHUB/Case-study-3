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
    function showDashboard()
    {
        if (!Gate::allows('loginAdmin')) {
            abort(403);
        }
        return view('admin.dashboard');
    }


    function create() {

        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    function index() {
        if (!Gate::allows('loginAdmin')) {
            abort(403);
        }
        $users = User::orDerBy('id','DESC')->paginate(5);
        return view('admin.users.list', compact('users'));
    }

    function store(User $user, RegisterRequest $request)
    {
            $path = 'images/JgMQEMsr6dD8rFpZhEGut5bMQY6QZj54yVHFSFW8.png';
            $user->name = $request->name;
            $user->image = $path;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role_id = 2;
            $user->save();
             toastr()->success('Thêm mới thành công');
            return redirect()->route('admin.showFromlogin');
    }

    public function edit($id)
    {
        if (!Gate::allows('loginAdmin')) {
            abort(403);
        }
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('admin.users.update', compact('user','roles'));
    }

    public function update(Request $request, User $user, $id)
    {
        if (!Gate::allows('loginAdmin')) {
            abort(403);
        }else{
            $user = User::findOrFail($id);
            if (!$request->hasFile('image')){
                $path = $user->image;
            }else{
                $path = $request->file('image')->store('images','public');
            }
            $password = $user->password;
            $user->name = $request->name;
            $user->image = $path;
            $user->email = $request->email;
            $user->password =$password;
            $user->role_id = $request->role;
            $user->save();
            toastr()->success('Update thành công');
            return redirect()->route('users.index');
        }
    }

    function delete($id){
        if (!Gate::allows('loginAdmin')) {
            abort(403);
        }
        $user = User::findOrFail($id);
        $user->delete();
        toastr()->success('Xóa thành công');
        return redirect()->route('users.index');
    }

    public function profileUser($id)
    {
        $user = User::findOrFail($id);
        return view('shop.profile.profile',compact('user'));
    }

    public function editProfile(Request $request,$id)
    {
        $user = User::findOrFail($id);
        if (!$request->hasFile('image')){
            $path = $user->image;
        }else{
            $path = $request->file('image')->store('images','public');
        }
        $pass = $user->password;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->image = $path;
        $user->password = $pass;
        $user->save();
        return redirect()->route('user.profile',$user->id);
    }

}
