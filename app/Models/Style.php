<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Style extends Model
{
    protected $table = 'styles';

    protected $fillable = [
        'type',
        'describe',
        'link',
        'status',
        'user_id'
    ];
}
