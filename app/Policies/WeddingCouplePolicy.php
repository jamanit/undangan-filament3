<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\WeddingCouple;
use App\Models\User;

class WeddingCouplePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any WeddingCouple');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, WeddingCouple $weddingcouple): bool
    {
        return $user->checkPermissionTo('view WeddingCouple');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create WeddingCouple');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, WeddingCouple $weddingcouple): bool
    {
        return $user->checkPermissionTo('update WeddingCouple');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, WeddingCouple $weddingcouple): bool
    {
        return $user->checkPermissionTo('delete WeddingCouple');
    }

    /**
     * Determine whether the user can delete any models.
     */
    public function deleteAny(User $user): bool
    {
        return $user->checkPermissionTo('delete-any WeddingCouple');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, WeddingCouple $weddingcouple): bool
    {
        return $user->checkPermissionTo('restore WeddingCouple');
    }

    /**
     * Determine whether the user can restore any models.
     */
    public function restoreAny(User $user): bool
    {
        return $user->checkPermissionTo('restore-any WeddingCouple');
    }

    /**
     * Determine whether the user can replicate the model.
     */
    public function replicate(User $user, WeddingCouple $weddingcouple): bool
    {
        return $user->checkPermissionTo('replicate WeddingCouple');
    }

    /**
     * Determine whether the user can reorder the models.
     */
    public function reorder(User $user): bool
    {
        return $user->checkPermissionTo('reorder WeddingCouple');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, WeddingCouple $weddingcouple): bool
    {
        return $user->checkPermissionTo('force-delete WeddingCouple');
    }

    /**
     * Determine whether the user can permanently delete any models.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->checkPermissionTo('force-delete-any WeddingCouple');
    }
}
