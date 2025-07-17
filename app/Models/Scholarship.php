<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Scholarship extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image_url',
        'link',
        'created_at',
    ];
    public $timestamps = false;
}
