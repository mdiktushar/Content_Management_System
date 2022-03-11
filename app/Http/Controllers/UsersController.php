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
}
