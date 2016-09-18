<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Style extends Model
{
    protected $table = 'styles';

    protected $fillable = [
        'cid',
        'type',
        'describe',
        'order',
        'user_id'
    ];
}
