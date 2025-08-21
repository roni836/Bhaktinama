<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceFaq extends Model
{
    protected $guarded = [];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
