<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\Role;
use App\Models\User;

class PostPolicy
{
    public function create(User $user)
    {
        // Permitir a contribuidores, moderadores y administradores
        return $user->hasRole([
            Role::CONTRIBUTOR,
            Role::MODERATOR,
            Role::ADMIN
        ]);
    }

    public function submitForReview(User $user, Post $post)
    {
        // Solo contribuidores necesitan enviar para revisión
        return $user->hasRole(Role::CONTRIBUTOR) && 
               $user->id === $post->user_id;
    }
    

}