<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['category_id', 'sub_cat_id', 'title', 'status', 'short_des', 'long_des', 'view', 'image'];
}
