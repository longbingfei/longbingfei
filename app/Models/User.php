<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    protected $fillable =
        [
            'username',
            'password',
            'avatar',
            'sex',
            'email',
            'tel',
            'status',
            'last_login_time',
            'last_login_ip'
        ];
    protected $hidden = [
        'password',
        'remember_token'
    ];
}
