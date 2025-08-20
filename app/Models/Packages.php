<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Packages extends Model
{
     use HasFactory;
    protected $guarded = [];

    public function temple()
    {
        return $this->belongsTo(Temple::class);
    }

}
