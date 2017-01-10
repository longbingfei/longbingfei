<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recovery extends Model
{
    protected $table = 'recovery';

    protected $fillable = [
        'from',
        'to',
        'type',
        'user_id'
    ];
}
