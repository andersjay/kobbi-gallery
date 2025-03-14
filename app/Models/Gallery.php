<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{
    use SoftDeletes;

    protected $table = 'galleries';

    protected $fillable = ['name', 'image'];

    protected $casts = [
        'deleted_at' => 'datetime',
    ];
}
