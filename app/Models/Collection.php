<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    protected $fillable = [
        'image',
        'artist',
        'title',
        'year',
        'size_cm',
        'additional_text',
    ];
}
