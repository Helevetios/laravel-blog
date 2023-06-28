<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\PostDec;

class Post extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function like($user_id)
    {
        if (!$this->likedBy($user_id)) {
            $this->likes()->create(['user_id' => $user_id]);
        }
    }

    public function unlike($user_id)
    {
        $this->likes()->where('user_id', $user_id->id)->delete();
    }

    public function likedBy($user_id)
    {
        return $this->likes()->where('user_id', $user_id->id)->exists();
    }
}
