<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // protected $with = ['profile', 'posts', 'role'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'created_at' => 'datetime:Y-m-d',
    ];


    public function profile()
    {
        return $this->hasOne(Profile::class)->withDefault([
            'phone' => 125369,
            'post_code' => 'UCS'
        ]);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function latestPost()
    {
        return $this->hasOne(Post::class)->ofMany('view', 'max');
        //return $this->hasOne(Post::class)->latestOfMany();
    }

    public function oldestPost()
    {
        return $this->hasOne(Post::class)->ofMany('view', 'min');
        return $this->hasOne(Post::class)->oldestOfMany();
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'skill_user')->withTimestamps()->as('biplob')->withPivot('view');
    }
}
