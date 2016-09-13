<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleSort extends Model
{
    protected $table = 'article_sorts';

    protected $fillable = [
        'fid',
        'name',
        'user_id',
        'is_last'
    ];
}
