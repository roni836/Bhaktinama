<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $casts = [
        'packages' => 'array',
        'faqs' => 'array',
    ];

    public function category()
    {
        return $this->belongsTo(ServiceCategory::class);
    }

    public function packages()
    {
        return $this->hasMany(ServicePackage::class);
    }

    public function faqs()
    {
        return $this->hasMany(ServiceFaq::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
