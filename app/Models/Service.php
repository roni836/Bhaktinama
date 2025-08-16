<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'short_description',
        'introduction',
        'importance',
        'traditions',
        'service_type',
        'images',
        'packages',
        'faqs',
        'price',
        'duration',
        'category',
        'location',
        'is_active',
        'featured',
        'meta_title',
        'meta_description'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'featured' => 'boolean',
        'price' => 'decimal:2',
        'images' => 'array',
        'packages' => 'array',
        'faqs' => 'array',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}