<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $table = 'logs';

    protected $fillable = [
        'date',
        'info',
        'user_id'
    ];

    public $timestamps = false;
}
