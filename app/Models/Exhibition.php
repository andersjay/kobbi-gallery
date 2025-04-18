<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Exhibition extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = 'exhibitions';

    protected $guard = [];

    protected $fillable = [
        'title',
        'slug',
        'author_name',
        'author_description',
        'description',
        'summary',
        'image',
        'banner',
        'gallery',
        'year',
        'start_date',
        'end_date',
        'is_active',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'gallery' => 'array'
    ];
}
