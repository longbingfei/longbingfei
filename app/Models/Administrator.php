<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Administrator extends Model implements AuthenticatableContract,AuthorizableContract,CanResetPasswordContract
{
    use Authenticatable, CanResetPassword, Authorizable;

    protected $table = 'administrators';

    protected $fillable =
        [
            'username',
            'name',
            'password',
            'sex',
            'email',
            'tel',
            'creator_id',
            'status',
            'last_login_time',
            'last_login_ip',
            'avatar',
        ];
    protected $hidden = [
        'password',
        'remember_token'
    ];
}
