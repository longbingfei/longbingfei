<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VideoSort extends Model
{
    protected $table = 'video_sorts';

    protected $fillable = [
        'name',
        'fid',
        'user_id'
    ];
}
