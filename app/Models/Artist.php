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
        'is_represented',
    ];

    protected $casts = [
        'image' => 'array',
        'is_represented' => 'boolean',
    ];

    public function artworks()
    {
        return $this->hasMany(Artwork::class)
            ->orderByDesc('featured')
            ->orderBy('order');
    }

    public function projects()
    {
        return $this->hasMany(Project::class)->orderBy('order');
    }
}
