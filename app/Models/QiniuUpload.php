<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QiniuUpload extends Model
{
    public $table = 'qiniu_uploads';

    protected $fillable = [
        'key',
        'hash',
        'w',
        'h',
        'symbol',
    ];
}
