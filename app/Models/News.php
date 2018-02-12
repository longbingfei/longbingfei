<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    public $table = 'news';

    protected $fillable = [
        'title',
        'content',
        'is_promote',
        'user_id',
    ];
}
