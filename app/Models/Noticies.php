<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Noticies extends Model
{
    protected $table = 'noticies';
    protected $fillable = [
        'title',
        'slug',
        'author_name',
        'content',
        'image',
        'summary',
        'is_active',
    ];
    protected $casts = [
        'is_active' => 'boolean',
    ];
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];


}
