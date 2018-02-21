<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Need extends Model
{
    protected $table = 'needs';

    protected $fillable = [
        'sort_id',
        'area_ids',
        'period',
        'status',
        'fork',
        'hot',
        'title',
        'company_name',
        'budget',
        'tel',
        'qq',
        'wechat',
        'images',
        'describe',
        'mark',
        'user_id',
        'is_promote'
    ];
}
