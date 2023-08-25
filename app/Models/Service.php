<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $casts = [
        'service_image' => 'array',
        'is_visible' => 'boolean',
        'is_featured' => 'boolean',
    ];

    protected $fillable = [
        'service_title',
        'service_content',
        'custom_field_1',
        'custom_field_2',
        'custom_field_3',
        'service_image',
        'is_visible',
        'is_featured',
        'slug'
    ];
}
