<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function permissions(Type $var = null)
    {
        # code...
        return $this->belongsToMany(Permission::class);
    }

    public function users(Type $var = null)
    {
        # code...
        return $this->belongsToMany(User::class);
    }
}
