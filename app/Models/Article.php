<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public $table = 'articles';

    protected $fillable = [
        'title',
        'content',
        'author_id',
        'status',
        'sort_id',
        'editor_id',
        'status',
        'tag_ids',
        'index_pic'
    ];
}
