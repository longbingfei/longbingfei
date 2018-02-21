<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prd extends Model
{
    public $table = 'prds';

    protected $fillable = [
        'sort_ids',
        'area_ids',
        'status',
        'fork',
        'hot',
        'is_promote',
        'name',
        'price',
        'storage',
        'images',
        'describe',
        'mark',
        'user_id',
        'company_id',
        'is_promote'
    ];
}