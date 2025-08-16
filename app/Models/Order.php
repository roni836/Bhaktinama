<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'price',
        'status',
        'payment_status',
        'payment_method',
        'shipping_address',
        'order_notes'
    ];
    
    /**
     * Get the user that owns the order
     */
    public function user()
    {
        return $this->belongsTo(User::class);
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