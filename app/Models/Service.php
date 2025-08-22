<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $casts = [
        'faqs' => 'array',
    ];

    public function category()
    {
        return $this->belongsTo(ServiceCategory::class);
    }
    public function packages()
    {
        return $this->hasMany(ServicePackage::class, 'service_id', 'id');
    }



    public function faqs()
    {
        return $this->hasMany(ServiceFaq::class, 'service_id');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
