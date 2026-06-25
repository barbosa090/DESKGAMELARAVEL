<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User;

class ProductPolicy
{
    /**
     * Determina se o usuário pode criar um produto
     */
    public function create(User $user): bool
    {
        return $user->is_admin;
    }

    /**
     * Determina se o usuário pode atualizar um produto
     */
    public function update(User $user, Product $product): bool
    {
        return $user->is_admin;
    }

    /**
     * Determina se o usuário pode deletar um produto
     */
    public function delete(User $user, Product $product): bool
    {
        return $user->is_admin;
    }

    /**
     * Determina se o usuário pode ver a página de edição
     */
    public function edit(User $user, Product $product): bool
    {
        return $user->is_admin;
    }
}
