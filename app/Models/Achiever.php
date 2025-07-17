<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Achiever extends Model
{
    protected $fillable = [
        'name',
        'achievement',
        'year',
        'photo_url',
    ];
}
