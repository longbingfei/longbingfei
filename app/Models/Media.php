<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table = "medias";

    protected $fillable = [
        'title',
        'sort',
        'path',
        'frame_id',
        'user_id'
    ];
}
