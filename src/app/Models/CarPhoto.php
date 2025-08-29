<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarPhoto extends Model
{
    protected $fillable = ['car_id', 'url'];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}

