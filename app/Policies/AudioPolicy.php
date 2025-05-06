<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Audio;
use App\Models\User;

class AudioPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any Audio');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Audio $audio): bool
    {
        return $user->checkPermissionTo('view Audio');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create Audio');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Audio $audio): bool
    {
        return $user->checkPermissionTo('update Audio');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Audio $audio): bool
    {
        return $user->checkPermissionTo('delete Audio');
    }

    /**
     * Determine whether the user can delete any models.
     */
    public function deleteAny(User $user): bool
    {
        return $user->checkPermissionTo('delete-any Audio');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Audio $audio): bool
    {
        return $user->checkPermissionTo('restore Audio');
    }

    /**
     * Determine whether the user can restore any models.
     */
    public function restoreAny(User $user): bool
    {
        return $user->checkPermissionTo('restore-any Audio');
    }

    /**
     * Determine whether the user can replicate the model.
     */
    public function replicate(User $user, Audio $audio): bool
    {
        return $user->checkPermissionTo('replicate Audio');
    }

    /**
     * Determine whether the user can reorder the models.
     */
    public function reorder(User $user): bool
    {
        return $user->checkPermissionTo('reorder Audio');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Audio $audio): bool
    {
        return $user->checkPermissionTo('force-delete Audio');
    }

    /**
     * Determine whether the user can permanently delete any models.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->checkPermissionTo('force-delete-any Audio');
    }
}
