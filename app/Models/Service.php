<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'category',
        'subcategory',
        'price',
        'duration',
        'description',
        'features',
        'image_path',
        'is_featured',
    ];

    protected $casts = [
        'features' => 'array',
        'is_featured' => 'boolean',
        'price' => 'integer',
    ];
}
