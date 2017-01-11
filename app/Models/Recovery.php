<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recovery extends Model
{
    protected $table = 'recovery';

    protected $fillable = [
        'material_id',
        'type',
        'info',
        'user_id'
    ];

    public $timestamps = false;
}
