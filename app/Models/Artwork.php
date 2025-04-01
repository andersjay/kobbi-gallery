<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Artwork extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'artist_id',
        'name',
        'description',
        'images'
    ];

    protected $casts = [
        'images' => 'array'
    ];

    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }
}
