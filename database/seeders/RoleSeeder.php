<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Asegurarse de que existen los permisos
        Permission::createDefaultPermissions();

        // Crear roles si no existen
        $visitorRole = Role::firstOrCreate(
            ['name' => Role::VISITOR],
            ['description' => 'Visitante regular con permisos básicos de visualización']
        );
        
        $contributorRole = Role::firstOrCreate(
            ['name' => Role::CONTRIBUTOR],
            ['description' => 'Colaborador de contenido que puede crear publicaciones y medios']
        );
        
        $moderatorRole = Role::firstOrCreate(
            ['name' => Role::MODERATOR],
            ['description' => 'Moderador de la comunidad que puede revisar y aprobar contenido']
        );
        
        $adminRole = Role::firstOrCreate(
            ['name' => Role::ADMIN],
            ['description' => 'Administrador con acceso total al sistema']
        );

        // Asignar permisos a los roles
        // Visitante
        $visitorRole->syncPermissions([
            Permission::VIEW_POSTS,
        ]);

        // Contribuidor
        $contributorRole->syncPermissions([
            Permission::VIEW_POSTS,
            Permission::CREATE_POSTS,
            Permission::EDIT_POSTS,
            Permission::DELETE_POSTS,
            Permission::UPLOAD_MEDIA,
            Permission::CREATE_EVENTS,
            Permission::CREATE_EDUCATIONAL_RESOURCES,
        ]);

        // Moderador
        $moderatorRole->syncPermissions([
            Permission::VIEW_POSTS,
            Permission::CREATE_POSTS,
            Permission::EDIT_POSTS,
            Permission::DELETE_POSTS,
            Permission::REVIEW_POSTS,
            Permission::UPLOAD_MEDIA,
            Permission::CREATE_EVENTS,
            Permission::CREATE_EDUCATIONAL_RESOURCES,
        ]);

        // Administrador
        $adminRole->syncPermissions(Permission::all());
    }
}
