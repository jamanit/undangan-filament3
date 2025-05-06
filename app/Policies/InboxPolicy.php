<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Inbox;
use App\Models\User;

class InboxPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any Inbox');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Inbox $inbox): bool
    {
        return $user->checkPermissionTo('view Inbox');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create Inbox');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Inbox $inbox): bool
    {
        return $user->checkPermissionTo('update Inbox');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Inbox $inbox): bool
    {
        return $user->checkPermissionTo('delete Inbox');
    }

    /**
     * Determine whether the user can delete any models.
     */
    public function deleteAny(User $user): bool
    {
        return $user->checkPermissionTo('delete-any Inbox');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Inbox $inbox): bool
    {
        return $user->checkPermissionTo('restore Inbox');
    }

    /**
     * Determine whether the user can restore any models.
     */
    public function restoreAny(User $user): bool
    {
        return $user->checkPermissionTo('restore-any Inbox');
    }

    /**
     * Determine whether the user can replicate the model.
     */
    public function replicate(User $user, Inbox $inbox): bool
    {
        return $user->checkPermissionTo('replicate Inbox');
    }

    /**
     * Determine whether the user can reorder the models.
     */
    public function reorder(User $user): bool
    {
        return $user->checkPermissionTo('reorder Inbox');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Inbox $inbox): bool
    {
        return $user->checkPermissionTo('force-delete Inbox');
    }

    /**
     * Determine whether the user can permanently delete any models.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->checkPermissionTo('force-delete-any Inbox');
    }
}
