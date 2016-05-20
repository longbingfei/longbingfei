<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table = "medias";

    protected $fillable = [
        'id',
        'name',
        'type',
        'path',
        'user_id'
    ];

    protected $types = [
        1 => '视频',
        2 => '音频',
        3 => '图片',
    ];
}
