<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = 'videos';

    protected $fillable = [
        'name',
        'sort_id',
        'path',
        'frame_path',
        'user_id'
    ];
}
