<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;

class PostPolicy
{
    /**
     * Determina se o usuário pode criar um post
     */
    public function create(User $user): bool
    {
        return $user->is_admin;
    }

    /**
     * Determina se o usuário pode atualizar um post
     */
    public function update(User $user, Post $post): bool
    {
        return $user->is_admin;
    }

    /**
     * Determina se o usuário pode deletar um post
     */
    public function delete(User $user, Post $post): bool
    {
        return $user->is_admin;
    }

    /**
     * Determina se o usuário pode ver a página de edição
     */
    public function edit(User $user, Post $post): bool
    {
        return $user->is_admin;
    }
}
