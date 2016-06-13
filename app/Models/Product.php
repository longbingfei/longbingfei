<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'name',
        'images',
        'describe',
        'price',
        'storage',
        'sort_id',
        'status',
        'user_id',
        'evaluate'
    ];
}
