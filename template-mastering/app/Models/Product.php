<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    // custom database
    // protected $table = 'my_products';

    // primary key
    // protected $primaryKey = 'flight_id';

    // const CREATED_AT = 'our_created_at';
    // const UPDATED_AT = 'our_updated_at';

    protected $attributes = [
        'price' => 1000,
    ];
}
