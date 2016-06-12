<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImageSort extends Model
{
    protected $table = 'image_sorts';

    protected $fillable = [
        'name',
        'fid',
        'user_id'
    ];
}
