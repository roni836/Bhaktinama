<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'shipping_address' => 'array',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
     public function items()
    {
        return $this->hasMany(OrderItem::class);
    }


    /**
     * Get the product associated with the order
     * Note: You'll need to create a Product model if it doesn't exist
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
