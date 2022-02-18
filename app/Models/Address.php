<?php

namespace App\Models;

use App\Models\User;
use App\Models\Location;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Address extends Model
{
    use HasFactory;

    protected $table = 'address';

    public function users() {
        return $this->belongsTo(User::class);
    }

    public function locations() {
        return $this->belongsTo(Location::class);
    }
}
