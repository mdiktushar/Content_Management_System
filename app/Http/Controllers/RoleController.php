<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoleController extends Controller
{
    //
    public function index(Type $var = null)
    {
        # code...
        return view('admin.roles.index');
    }

    public function store(Type $var = null)
    {
        # code...
        dd(request('name'));
    }
}
