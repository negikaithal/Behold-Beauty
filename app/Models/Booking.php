<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_number',
        'customer_name',
        'phone',
        'email',
        'service_category',
        'specific_service',
        'preferred_date',
        'preferred_time',
        'number_of_people',
        'message',
        'status',
    ];

    protected $casts = [
        'preferred_date' => 'date',
        'number_of_people' => 'integer',
    ];
}
