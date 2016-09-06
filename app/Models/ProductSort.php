<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductSort extends Model
{
    protected $table = 'product_sorts';

    protected $fillable = [
        'fid',
        'name',
        'user_id',
        'is_last'
    ];
}
