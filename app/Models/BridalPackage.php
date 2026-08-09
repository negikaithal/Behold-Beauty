<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BridalPackage extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'badge',
        'price',
        'tagline',
        'features',
        'is_popular',
    ];

    protected $casts = [
        'features' => 'array',
        'is_popular' => 'boolean',
        'price' => 'integer',
    ];
}
