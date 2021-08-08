<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $guarded = [];
    function cities()
    {
        return $this->hasMany(City::class);
    }
    // A => Country
    // B => City
    // C => shop
    function shops()
    {
        return $this->hasManyThrough(Shop::class, City::class, 'country_id', 'city_id');
    }
}
