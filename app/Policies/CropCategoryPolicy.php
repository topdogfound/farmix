<?php

namespace App\Policies;

use App\Models\CropCategory;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CropCategoryPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, CropCategory $cropCategory): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create crop categories');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, CropCategory $cropCategory): bool
    {
        return $user->hasPermissionTo('edit crop categories');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, CropCategory $cropCategory): bool
    {
        return $user->hasPermissionTo('delete crop categories');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, CropCategory $cropCategory): bool
    {
        return $user->hasPermissionTo('restore crop categories');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, CropCategory $cropCategory): bool
    {
        return $user->hasPermissionTo('force delete crop categories');
    }
}
