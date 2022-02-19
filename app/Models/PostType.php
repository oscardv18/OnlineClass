<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PostType extends Model
{
    use HasFactory;

    protected $table = 'posts_type';

    public function posts() {
        return $this->hasMany(Post::class);
    }
}
