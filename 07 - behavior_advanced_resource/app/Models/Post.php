<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'subtitle', 'description', 'author', 'slug'];
    public const RELATIONSHIP_POST_CATEGORY = 'post_category';

    public function author()
    {
        return $this->belongsTo(User::class, 'author', 'id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, self::RELATIONSHIP_POST_CATEGORY, 'post','category');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'item');
    }

    public function getCreatedFmtAttribute()
    {
        return date('d/m/Y H:i', strtotime($this->created_at));
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
}
