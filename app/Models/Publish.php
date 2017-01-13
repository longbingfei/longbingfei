<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publish extends Model
{
    protected $table = 'publish';

    protected $fillable = [
        'cid',
        'type',
        'title',
        'keywords',
        'index_pic',
        'path',
        'tag_ids',
        'user_id'
    ];
}
