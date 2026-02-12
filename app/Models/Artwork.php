<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Artwork extends Model
{
    use HasFactory, SoftDeletes;

    protected static function booted()
    {
        static::creating(function ($artwork) {
            if ($artwork->project_id && !$artwork->artist_id) {
                $artwork->artist_id = $artwork->project->artist_id;
            }
        });
    }

    protected $fillable = [
        'artist_id',
        'project_id',
        'name',
        'description',
        'images',
        'year',
        'technique',
        'size_cm',
        'order',
        'featured'
    ];

    protected $casts = [
        'images' => 'array',
        'featured' => 'boolean',
        'order' => 'integer'
    ];

    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
