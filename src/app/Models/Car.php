<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'type', 'brand', 'model', 'version', 'year_model', 'year_build',
        'doors', 'board', 'chassi', 'transmission', 'km', 'description',
        'price', 'color', 'fuel', 'category', 'url_car'
    ];

    public function photos()
    {
        return $this->hasMany(CarPhoto::class);
    }
}

