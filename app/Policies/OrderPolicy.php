<?php

namespace App\Policies;

use App\Models\User;

class OrderPolicy
{
    /**
     * Create a new policy instance.
     */
    public function create(User $user)
    {
        return $user->role === 'customer'; // hanya customer boleh checkout
    }
}
