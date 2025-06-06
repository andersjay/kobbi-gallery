<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactSetting extends Model
{
    protected $fillable = [
        'section1_title',
        'section1_description',
        'section2_title',
        'section2_description',
        'section3_title',
        'section3_description',
    ];
}
