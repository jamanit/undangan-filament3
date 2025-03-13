<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Streaming;
use App\Models\User;

class StreamingPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any Streaming');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Streaming $streaming): bool
    {
        return $user->checkPermissionTo('view Streaming');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create Streaming');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Streaming $streaming): bool
    {
        return $user->checkPermissionTo('update Streaming');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Streaming $streaming): bool
    {
        return $user->checkPermissionTo('delete Streaming');
    }

    /**
     * Determine whether the user can delete any models.
     */
    public function deleteAny(User $user): bool
    {
        return $user->checkPermissionTo('delete-any Streaming');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Streaming $streaming): bool
    {
        return $user->checkPermissionTo('restore Streaming');
    }

    /**
     * Determine whether the user can restore any models.
     */
    public function restoreAny(User $user): bool
    {
        return $user->checkPermissionTo('restore-any Streaming');
    }

    /**
     * Determine whether the user can replicate the model.
     */
    public function replicate(User $user, Streaming $streaming): bool
    {
        return $user->checkPermissionTo('replicate Streaming');
    }

    /**
     * Determine whether the user can reorder the models.
     */
    public function reorder(User $user): bool
    {
        return $user->checkPermissionTo('reorder Streaming');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Streaming $streaming): bool
    {
        return $user->checkPermissionTo('force-delete Streaming');
    }

    /**
     * Determine whether the user can permanently delete any models.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->checkPermissionTo('force-delete-any Streaming');
    }
}
