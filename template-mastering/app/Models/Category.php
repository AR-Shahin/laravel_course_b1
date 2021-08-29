<?php

namespace App\Models;

use App\Events\CategoryDeleteEvent;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use PhpParser\Node\Expr\FuncCall;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'image', 'user_id'];

    // protected $guarded = [];


    // mutator

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value);
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucwords($value);
    }
    // accessor

    public function getNameAttribute($value)
    {
        return ucwords($value);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }


    protected $dispatchesEvents = [
        'deleted' => CategoryDeleteEvent::class,
        // 'created' => CategoryDeleteEvent::class,
    ];


    protected static function booted()
    {
        static::updated(function ($product) {
            cache()->forget('categories');

            $categories = Category::get();
            cache('categories', $categories);
        });
    }
}
