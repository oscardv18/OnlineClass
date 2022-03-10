<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_file', 'extension', 'file_path', 'post_id',
    ];

    public function getCreatedAtAttribute($value) {
        return \Carbon\Carbon::parse($value)->format('d/m/Y H:i');
    }

    public function getUpdatedAtAttribute($value) {
        return \Carbon\Carbon::parse($value)->format('d/m/Y H:i');
    }

    public function posts() {
        return $this->belongsTo(Post::class);
    }
}
