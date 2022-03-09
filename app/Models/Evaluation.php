<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Evaluation extends Model
{
    use HasFactory;

    protected $table = "evaluations";

    protected $fillable = [
        'path', 'name', 'post_id', 'user_id',
    ];

    public function posts()
    {
        return $this->belongsTo(Post::class);
    }
}
