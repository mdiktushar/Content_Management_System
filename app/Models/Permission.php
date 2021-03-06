<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function roles(Type $var = null)
    {
        # code...
        return $this->belongsToMany(Role::class);
    }

    public function users(Type $var = null)
    {
        # code...
        return $this->belongsToMany(User::class);
    }
}
