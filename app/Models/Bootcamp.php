<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bootcamp extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image_url',
        'link',
        'date',
    ];
}
