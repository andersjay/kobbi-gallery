<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'logo',
        'address',
        'contact_phone',
        'contact_email',
        'schedule_week',
        'schedule_saturday',
        'copyright',
    ];
} 