<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'level'
    ];

    protected $visible = array(
        'name',
        'email',
        'admin'
    );

    protected $appends = array(
        'admin'
    );

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function addressDelivery()
    {
        return $this->hasOne(Address::class, 'user', 'id');
    }

    public function posts()
    {
       return $this->hasMany(Post::class, 'author', 'id');
    }

    public function commentsOnMyPost()
    {
        return $this->hasManyThrough(Comment::class, Post::class, 'author', 'post', 'id', 'id');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'item');
    }

    public function scopeStudents()
    {
        return self::query()->where('level', '<=', '5');
    }

    public function scopeAdmins()
    {
        return self::query()->where('level', '>', '5');
    }

    public function getAdminAttribute()
    {
        return ($this->attributes['level'] > 5 ? true : false);
    }
}
