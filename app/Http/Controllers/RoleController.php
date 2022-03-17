<?php

namespace App\Http\Controllers;

// Models
use App\Models\Role;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    //
    public function index(Type $var = null)
    {
        # code...
        return view('admin.roles.index', ['roles' => Role::all()]);
    }

    public function store(Type $var = null)
    {
        # code...
        request()->validate([
            'name' => ['required']
        ]);
        Role::create([
            'name' => Str::ucfirst(request('name')),
            'slug' => Str::of(Str::lower(request('name')))->slug('-'),
        ]);
        return back();
    }

    public function edit(Role $role)
    {
        # code...
        return view('admin.roles.edit', ['role'=> $role]);
    }

    public function distroy(Request $request, Role $role)
    {
        # code...
        $role->delete();
        $request->session()->flash('role-delete', 'Deleted');
        return back();
    }

    public function update(Role $role)
    {
        # code...
        request()->validate([
            'name' => ['required']
        ]);
        $role->name = Str::ucfirst(request('name'));
        $role->slug = Str::of(Str::lower(request('name')))->slug('-');
        
        if ($role->isDirty('name')) {
            session()->flash('role_updated', 'Role is Updated');
            $role->save();
        } else {
            session()->flash('role_updated', 'All is Up to date');
        }
        
        return back();
    }
}
