<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = "roles";

    public $fillable = [
        'id',
        'name',
        'user_id'
    ];
}
