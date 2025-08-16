<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temple extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'location',
        'address',
        'phone',
        'email',
        'website',
        'image',
        'deity',
        'timings',
        'entry_fee',
        'is_active',
        'latitude',
        'longitude'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'entry_fee' => 'decimal:2',
        'latitude' => 'decimal:8,6',
        'longitude' => 'decimal:9,6',
    ];
}