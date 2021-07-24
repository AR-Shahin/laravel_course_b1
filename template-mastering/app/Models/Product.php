<?php

namespace App\Models;

use App\Events\DataCreate;
use App\Scopes\ViewScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Symfony\Component\Mime\Part\DataPart;

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

    protected static function booted()
    {
        // static::addGlobalScope(new ViewScope);

        // static::addGlobalScope('lessThanFifty', function (Builder $builder) {
        //     $builder->where('view', '<', 50);
        // });


        static::created(function ($product) {
            info('I am created');
        });

        // static::retrieved(function ($product) {
        //     info('I am retrieved');
        // });
    }


    public function scopePopular($query)
    {
        return $query->where('quantity', '>', 50);
    }

    // public function scopeActive($query)
    // {
    //     return $query->where('status', '=', 1);
    // }

    // public function scopeInactive($query)
    // {
    //     return $query->where('status', '=', 0);
    // }

    public function scopeDynamicStatus($query, $status = 1)
    {
        return $query->where('status', '=', $status);
    }


    // protected $dispatchesEvents = [
    //     'created' => DataCreate::class
    // ];
}
