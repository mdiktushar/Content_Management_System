<?php

namespace App\Http\Controllers;

// Models
use App\Models\Role;
use App\Models\Permission;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PermissionController extends Controller
{
    //
    public function index(Type $var = null)
    {
        # code...
        return view('admin.permissions.index', [
            'permissions' => Permission::all()
        ]);
    }

    public function store(Type $var = null)
    {
        # code...
        request()->validate([
            'name' => ['required']
        ]);
        Permission::create([
            'name' => Str::ucfirst(request('name')),
            'slug' => Str::of(Str::lower(request('name')))->slug('-'),
        ]);
        return back();
    }

    public function edit(Permission $permission)
    {
        # code...
        return view('admin.permissions.edit', [
            'permission' => $permission
        ]);
    }

    public function distroy(Permission $permission)
    {
        # code...
        $permission->delete();
        return back();
    }

    public function update(Permission $permission)
    {
        # code...
        request()->validate([
            'name' => ['required']
        ]);
        $permission->name = Str::ucfirst(request('name'));
        $permission->slug = Str::of(Str::lower(request('name')))->slug('-');
        
        if ($permission->isDirty('name')) {
            session()->flash('permission_session', 'Permission is Updated');
            $permission->save();
        } else {
            session()->flash('permission_session', 'All is Up to date');
        }
        
        return back();
    }
}
