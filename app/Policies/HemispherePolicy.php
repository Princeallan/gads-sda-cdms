<?php

namespace App\Policies;

use App\Models\Hemisphere;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class HemispherePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasAnyRole(['super-admin', 'admin', 'moderator', 'developer']);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Hemisphere $hemisphere): bool
    {
        return $user->hasAnyRole(['super-admin', 'admin']);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasAnyRole(['super-admin', 'admin']);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Hemisphere $hemisphere): bool
    {
        return $user->hasAnyRole(['super-admin', 'admin']);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Hemisphere $hemisphere): bool
    {
        return $user->hasAnyRole(['super-admin', 'admin']);
    }
}
