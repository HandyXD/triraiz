<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class User extends Authenticatable
{

    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_image',
        'bio',
        'community_id',
        'region',
        'specialty',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    public function community(): BelongsTo
    {
        return $this->belongsTo(Community::class);
    }

    /**
     * Get the roles that belong to the user.
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function hasPermission($permissionName)
    {
        foreach ($this->roles as $role) {
            if ($role->permissions->contains('name', $permissionName)) {
                return true;
            }
        }
        return false;
    }
    
    /**
     * Get the posts that belong to the user.
     */
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

  // /**
  //  * Get the comments that belong to the user.
  //  */
  // public function comments(): HasMany
  // {
  //     return $this->hasMany(Comment::class);
  // }

  // /**
  //  * Get the media that belong to the user.
  //  */
  // public function media(): HasMany
  // {
  //     return $this->hasMany(Media::class);
  // }

  // /**
  //  * Get the content reviews that belong to the user.
  //  */
  // public function contentReviews(): HasMany
  // {
  //     return $this->hasMany(ContentReview::class, 'reviewer_id');
  // }

    /**
     * Check if user has a specific role.
     */
    public function hasRole($roleName): bool
    {
        if (is_array($roleName)) {
            return $this->roles()->whereIn('name', $roleName)->exists();
        }
        
        return $this->roles()->where('name', $roleName)->exists();
    }
    

    /**
     * Check if user has any of the given roles.
     */
    public function hasAnyRole($roleNames): bool
    {
        return $this->roles()->whereIn('name', (array) $roleNames)->exists();
    }

    /**
     * Check if user has all of the given roles.
     */
    public function hasAllRoles($roleNames): bool
    {
        $roleNames = (array) $roleNames;
        return $this->roles()->whereIn('name', $roleNames)->count() === count($roleNames);
    }

    /**
     * Check if user can review content.
     */
    public function canReviewContent(): bool
    {
        return $this->hasAnyRole(['moderator', 'admin']);
    }

    /**
     * Check if user can create content.
     */
    public function canCreateContent(): bool
    {
        return $this->hasAnyRole(['contributor', 'moderator', 'admin']);
    }


    /**
     * Get the user's initials
     */
    public function initials(): string
    {
        return Str::of($this->name)
            ->explode(' ')
            ->map(fn (string $name) => Str::of($name)->substr(0, 1))
            ->implode('');
    }
}
