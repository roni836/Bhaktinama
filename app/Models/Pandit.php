<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pandit extends Model
{

     use HasFactory;
    protected $guarded = [];


    public function temple()
    {
        return $this->belongsTo(Temple::class);
    }
}
