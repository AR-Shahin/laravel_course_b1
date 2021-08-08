<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Machanic extends Model
{
    use HasFactory;

    protected $guarded = [];

    function car()
    {
        return $this->hasOne(Car::class);
    }

    // A = > Machanic
    // B => Car
    // C => Owner
    function owner()
    {
        return $this->hasOneThrough(Owner::class, Car::class, 'machanic_id', 'car_id', 'id', 'id');
    }
}
