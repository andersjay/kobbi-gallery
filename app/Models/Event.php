<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'date',
        'cover_image',
        'description',
    ];

    public function images()
    {
        return $this->hasMany(EventImage::class);
    }
} 