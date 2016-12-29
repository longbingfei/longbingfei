<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GallerySort extends Model
{
    protected $table = 'gallery_sorts';

    protected $fillable = [
        'id',
        'fid',
        'name',
        'is_last',
        'user_id'
    ];
}
