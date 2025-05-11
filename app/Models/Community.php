<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Community extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'location',
        'banner_image',
        'logo',
        'history',
        'traditions',
        'contact_info',
        'language',
    ];

    /**
     * Get the users that belong to the community.
     */
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    /**
     * Get the posts that belong to the community.
     */
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

 //  /**
 //   * Get the educational resources that belong to the community.
 //   */
 //  public function educationalResources(): HasMany
 //  {
 //      return $this->hasMany(EducationalResource::class);
 //  }

 //  /**
 //   * Get the events that belong to the community.
 //   */
 //  public function events(): HasMany
 //  {
 //      return $this->hasMany(Event::class);
 //  }

    /**
     * Get the moderators of this community.
     */
    public function moderators()
    {
        return $this->users()
            ->whereHas('roles', function ($query) {
                $query->where('name', 'moderator');
            });
    }

    /**
     * Check if a user is a moderator of this community.
     */
    public function isModerator(User $user): bool
    {
        return $user->hasRole('moderator') && $user->community_id === $this->id;
    }

    /**
     * Get posts pending review in this community.
     */
    public function pendingReviewPosts()
    {
        return $this->posts()->where('status', 'pendiente');
    }

    /**
     * Get published posts in this community.
     */
    public function publishedPosts()
    {
        return $this->posts()->where('status', 'publicado');
    }

    /**
     * Get featured image URL or default if none.
     */
    public function getBannerImageUrlAttribute(): string
    {
        return $this->banner_image 
            ? asset('storage/' . $this->banner_image)
            : asset('img/defecto.png');
    }

    /**
     * Get logo URL or default if none.
     */
    public function getLogoUrlAttribute(): string
    {
        return $this->logo 
            ? asset('storage/' . $this->logo)
            : asset('img/logo.png');
    }
}