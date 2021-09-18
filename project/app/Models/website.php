<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'logo', 'address', 'email', 'phone', 'facebook', 'twitter', 'instagram', 'behance', 'footer_1', 'footer_2'];
}
