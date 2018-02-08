<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NeedWork extends Model
{
    protected $table = 'needs';

    protected $fillable = [
        'sort_id',
        'area_id',
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
    ];
}
