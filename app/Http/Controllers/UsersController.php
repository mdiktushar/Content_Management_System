<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Models
use App\Models\User;

class UsersController extends Controller
{
    //
    public function show(User $user)
    {
        # code...
        return view('admin.users.profile', ['user' => $user]);
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
}
