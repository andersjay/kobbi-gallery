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
        'image_url',
        'summary',
        'is_active',
        'is_pinned',
        'sort_order',
        'url',
        'date',
    ];
    protected $casts = [
        'is_active' => 'boolean',
        'is_pinned' => 'boolean',
        'date' => 'date',
    ];
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];


}
