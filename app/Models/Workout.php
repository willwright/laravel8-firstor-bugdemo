<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    use HasFactory;

    protected $hidden = ['laravel_through_key'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
