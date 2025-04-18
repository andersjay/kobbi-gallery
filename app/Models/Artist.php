<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Artist extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'artists';

    protected $fillable = [
        'name',
        'description',
        'image',
    ];

    protected $casts = [
        'image' => 'array',
    ];

    public function artworks()
    {
        return $this->hasMany(Artwork::class);
    }
}
