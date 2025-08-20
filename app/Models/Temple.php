<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temple extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $casts = [
        'images' => 'array',
    ];

    public function packages()
    {
        return $this->hasMany(Packages::class);
    }

    public function pandits()
    {
        return $this->hasMany(Pandit::class);
    }
}
