<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = 'galleries';

    protected $fillable = [
        'title',
        'keywords',
        'index_pic',
        'images',
        'describes',
        'status',
        'weight',
        'tags',
        'user_id'
    ];
}
