<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'pandit_id',
        'ceremony_type',
        'ceremony_date',
        'location',
        'special_requests',
        'status',
        'amount',
        'payment_status'
    ];

    protected $casts = [
        'ceremony_date' => 'datetime',
        'amount' => 'decimal:2',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pandit()
    {
        return $this->belongsTo(Pandit::class);
    }
}
