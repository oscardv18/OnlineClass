<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InstituteData extends Model
{
    use HasFactory;

    protected $table = 'institute_data';
    protected $fillable = [
        'rif', 'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
