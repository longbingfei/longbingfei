<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NeedCompany extends Model
{
    protected $table = 'need_company';

    protected $fillable = [
        'company_id',
        'need_id',
        'status',
    ];
}
