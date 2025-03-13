<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\LoveStory;
use App\Models\User;

class LoveStoryPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any LoveStory');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, LoveStory $lovestory): bool
    {
        return $user->checkPermissionTo('view LoveStory');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create LoveStory');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, LoveStory $lovestory): bool
    {
        return $user->checkPermissionTo('update LoveStory');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, LoveStory $lovestory): bool
    {
        return $user->checkPermissionTo('delete LoveStory');
    }

    /**
     * Determine whether the user can delete any models.
     */
    public function deleteAny(User $user): bool
    {
        return $user->checkPermissionTo('delete-any LoveStory');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, LoveStory $lovestory): bool
    {
        return $user->checkPermissionTo('restore LoveStory');
    }

    /**
     * Determine whether the user can restore any models.
     */
    public function restoreAny(User $user): bool
    {
        return $user->checkPermissionTo('restore-any LoveStory');
    }

    /**
     * Determine whether the user can replicate the model.
     */
    public function replicate(User $user, LoveStory $lovestory): bool
    {
        return $user->checkPermissionTo('replicate LoveStory');
    }

    /**
     * Determine whether the user can reorder the models.
     */
    public function reorder(User $user): bool
    {
        return $user->checkPermissionTo('reorder LoveStory');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, LoveStory $lovestory): bool
    {
        return $user->checkPermissionTo('force-delete LoveStory');
    }

    /**
     * Determine whether the user can permanently delete any models.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->checkPermissionTo('force-delete-any LoveStory');
    }
}
