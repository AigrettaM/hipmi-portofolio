<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carousels extends Model
{
    protected $fillable = [
        'image_url',
        'title',
        'description',
        'link',
    ];
}
