<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    protected $fillable = [
        'name',
        'email',
        'message',
        'created_at',
    ];
    public $timestamps = false;
}
