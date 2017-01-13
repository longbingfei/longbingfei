<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $table = 'products';

    protected $fillable = [
        'pid',
        'name',
        'images',
        'describe',
        'price',
        'storage',
        'sort_id',
        'status',
        'tag_ids',
        'user_id',
        'evaluate',
        'is_promote',
        'is_carousel'
    ];
}
