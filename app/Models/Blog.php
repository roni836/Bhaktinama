<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'excerpt',
        'image',
        'author',
        'category',
        'tags',
        'is_published',
        'featured',
        'published_at',
        'meta_title',
        'meta_description'
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'featured' => 'boolean',
        'published_at' => 'datetime',
        'tags' => 'array'
    ];

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($blog) {
            if (empty($blog->slug)) {
                $blog->slug = \Str::slug($blog->title);
            }
        });
    }
}