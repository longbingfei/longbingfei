<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companys';

    protected $fillable = [
        'sort_ids',
        'operate_ids',
        'status',
        'fork',
        'hot',
        'area_ids',
        'company_name',
        'address',
        'name',
        'tel',
        'wechat',
        'qq',
        'email',
        'image',
        'logo',
        'describe',
        'mark',
        'user_id',
        'is_promote'
    ];
}
