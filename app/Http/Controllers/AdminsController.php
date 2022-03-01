<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminsController extends Controller
{
    //
    public function index(Type $var = null)
    {
        # code...
        return view('admin.index');
    }
}
