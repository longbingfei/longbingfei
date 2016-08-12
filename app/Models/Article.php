<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';

    protected $fillable = [
        'title',
        'content',
        'author_id',
        'status',
        'sort_id',
        'editor_id',
        'status',
        'index_pic'
    ];
}
