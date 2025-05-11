<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'excerpt',
        'featured_image',
        'type',
        'status',
        'user_id',
        'community_id',
        'language',
        'is_featured',
        'views',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'views' => 'integer',
    ];

    // Relaciones
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    

    public function community()
    {
        return $this->belongsTo(Community::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    // Slug automático desde el título
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
                'unique' => true
            ]
        ];
    }
}
