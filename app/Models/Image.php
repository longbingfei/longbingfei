<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public $table = 'images';
    protected $fillable = [
        'name',
        'sort_id',
        'path',
        'thumb',
        'user_id'
    ];
}
