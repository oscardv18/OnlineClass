<?php

namespace App\Models;

use App\Models\File;
use App\Models\Team;
use App\Models\User;
use App\Models\Rating;
use App\Models\PostType;
use App\Models\Evaluation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'content', 'content', 'user_id', 'post_type_id', 'team_id',
    ];

    protected $casts = [
        'created_at' => 'datetime:d-m-Y',
        'updated_at' => 'datetime:d-m-Y'
    ];

    public function users() {
        return $this->belongsTo(User::class);
    }

    public function teams() {
        return $this->belongsTo(Team::class);
    }

    public function posts_type() {
        return $this->belongsTo(PostType::class);
    }

    public function files() {
        return $this->hasMany(File::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function evaluations()
    {
        return $this->hasMany(Evaluation::class);
    }
}
