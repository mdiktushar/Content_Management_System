<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Post;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function setPasswordAttribute($value)
    {
        # code...
        $this->attributes['password'] = bcrypt($value);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function permissions(Type $var = null)
    {
        # code...
        return $this->belongsToMany(Permission::class);
    }
    public function roles(Type $var = null)
    {
        # code...
        return $this->belongsToMany(Role::class);
    }

    public function userHasRole($role_name)
    {
        # code...
        foreach ($this->roles as $role) {
            # code...
            if ($role_name == $role->name) {
                # code...
                return true;
            }
        }
        return false;
    }
}
