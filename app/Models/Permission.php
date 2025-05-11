<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Permission extends Model
{
    use HasFactory;

    /**
     * Constantes de permisos para usar en toda la aplicación
     */
    public const VIEW_POSTS = 'view_posts';
    public const CREATE_POSTS = 'create_posts';
    public const EDIT_POSTS = 'edit_posts';
    public const DELETE_POSTS = 'delete_posts';
    public const REVIEW_POSTS = 'review_posts';
    public const MANAGE_USERS = 'manage_users';
    public const MANAGE_COMMUNITIES = 'manage_communities';
    public const MANAGE_ROLES = 'manage_roles';
    public const UPLOAD_MEDIA = 'upload_media';
    public const CREATE_EVENTS = 'create_events';
    public const CREATE_EDUCATIONAL_RESOURCES = 'create_educational_resources';

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
     * Get the roles that belong to the permission.
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * Create default permissions for the system.
     */
    public static function createDefaultPermissions(): void
    {
        $permissions = [
            [
                'name' => self::VIEW_POSTS,
                'description' => 'Ver publicaciones publicadas'
            ],
            [
                'name' => self::CREATE_POSTS,
                'description' => 'Crear nuevas publicaciones'
            ],
            [
                'name' => self::EDIT_POSTS,
                'description' => 'Editar publicaciones propias'
            ],
            [
                'name' => self::DELETE_POSTS,
                'description' => 'Eliminar publicaciones propias'
            ],
            [
                'name' => self::REVIEW_POSTS,
                'description' => 'Revisar y aprobar/rechazar publicaciones'
            ],
            [
                'name' => self::MANAGE_USERS,
                'description' => 'Gestionar usuarios'
            ],
            [
                'name' => self::MANAGE_COMMUNITIES,
                'description' => 'Gestionar comunidades'
            ],
            [
                'name' => self::MANAGE_ROLES,
                'description' => 'Gestionar roles y permisos'
            ],
            [
                'name' => self::UPLOAD_MEDIA,
                'description' => 'Subir archivos multimedia'
            ],
            [
                'name' => self::CREATE_EVENTS,
                'description' => 'Crear eventos comunitarios'
            ],
            [
                'name' => self::CREATE_EDUCATIONAL_RESOURCES,
                'description' => 'Crear recursos educativos'
            ],
        ];

        foreach ($permissions as $permission) {
            self::firstOrCreate(['name' => $permission['name']], $permission);
        }
    }
}