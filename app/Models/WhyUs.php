<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhyUs extends Model
{
    use HasFactory;

    protected $casts = [
        'why_us_featured_image' => 'array',
        'is_visible' => 'boolean',
        'is_featured' => 'boolean',
    ];

    protected $fillable = [
        'why_us_title',
        'why_us_content',
        'why_us_field_1',
        'why_us_field_2',
        'why_us_field_3',
        'why_us_featured_image',
        'is_visible',
        'is_featured',
        'slug'
    ];
}
