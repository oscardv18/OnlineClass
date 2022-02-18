<?php

namespace App\Models;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rating extends Model
{
    use HasFactory;

    public function posts() {
        return $this->belongsTo(Post::class);
    }

    public function users() {
        return $this->belongsTo(User::class);
    }
}
