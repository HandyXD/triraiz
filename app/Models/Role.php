<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    use HasFactory;

    /**
     * Constantes de roles para usar en toda la aplicación
     */
    public const VISITOR = 'visitor';
    public const CONTRIBUTOR = 'contributor';
    public const MODERATOR = 'moderator';
    public const ADMIN = 'admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
    ];

    /**
     * Get the users that belong to the role.
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * Get the permissions that belong to the role.
     */
    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class);
    }

    /**
     * Check if role has a specific permission.
     */
    public function hasPermission($permissionName): bool
    {
        return $this->permissions()->where('name', $permissionName)->exists();
    }

    /**
     * Check if role has any of the given permissions.
     */
    public function hasAnyPermission($permissionNames): bool
    {
        return $this->permissions()->whereIn('name', (array) $permissionNames)->exists();
    }

    /**
     * Check if role has all of the given permissions.
     */
    public function hasAllPermissions($permissionNames): bool
    {
        $permissionNames = (array) $permissionNames;
        return $this->permissions()->whereIn('name', $permissionNames)->count() === count($permissionNames);
    }

    /**
     * Assign permissions to the role.
     */
    public function assignPermissions($permissions)
    {
        $permissions = collect($permissions)->map(function ($permission) {
            if (is_string($permission)) {
                return Permission::where('name', $permission)->first()->id;
            }
            return $permission->id;
        });

        return $this->permissions()->sync($permissions, false);
    }

    /**
     * Revoke permissions from the role.
     */
    public function revokePermissions($permissions)
    {
        $permissions = collect($permissions)->map(function ($permission) {
            if (is_string($permission)) {
                return Permission::where('name', $permission)->first()->id;
            }
            return $permission->id;
        });

        return $this->permissions()->detach($permissions);
    }

    /**
     * Sync permissions to the role.
     */
    public function syncPermissions($permissions)
    {
        $permissions = collect($permissions)->map(function ($permission) {
            if (is_string($permission)) {
                return Permission::where('name', $permission)->first()->id;
            }
            return $permission->id;
        });

        return $this->permissions()->sync($permissions);
    }
}