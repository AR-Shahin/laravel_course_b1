<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function posts()
    {
        return $this->morphedByMany(Post::class, 'taggable', 'tagebles');
    }

    public function products()
    {
        return $this->morphedByMany(Product::class, 'taggable', 'tagebles');
    }
}
