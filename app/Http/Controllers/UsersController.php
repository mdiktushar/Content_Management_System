<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Models
use App\Models\User;
use App\Models\Role;

class UsersController extends Controller
{
    //
    public function show(User $user)
    {
        # code...
        return view('admin.users.profile', [
            'user' => $user,
            'roles' => Role::all(),
        ]);
    }

    public function update(User $user)
    {
        # code...
        $inputs = \request()->validate([
            'username' => ['required', 'string', 'max:255', 'alpha_dash'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'avatar' => ['file:jpeg, jpg, png'],
            // 'password' => ['min:6', 'max:255', 'confirmed'],
        ]);
        if (request('avatar')) {
            $inputs['avatar'] = request('avatar')->store('images');
        }

        $user->update($inputs);
        return back();
    }

    public function index(Type $var = null)
    {
        # code...
        $users = User::all();
        return view('admin.users.index', ['users'=> $users]);
    }

    public function distroy(User $user, Request $request)
    {
        # code...
        $user->delete();
        $request->session()->flash('user_delete', 'User has been deleted');
        return back();
    }

    public function attach(User $user)
    {
        # code...
        $user->roles()->attach(request('role'));
        return back();
    }

    public function detach(User $user)
    {
        # code...
        $user->roles()->detach(request('role'));
        return back();
    }
}
