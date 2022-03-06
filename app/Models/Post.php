<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the user that owns the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getPostImageAttribute($value)
    {
        # code...
        if (strpos($value, 'https://')!==false || strpos($value, 'http://')!==false) {
            return $value;
        }
        return asset('storage/'.$value);
    }
}
