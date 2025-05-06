<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\SiteConfig;
use App\Models\User;

class SiteConfigPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any SiteConfig');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, SiteConfig $siteconfig): bool
    {
        return $user->checkPermissionTo('view SiteConfig');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create SiteConfig');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, SiteConfig $siteconfig): bool
    {
        return $user->checkPermissionTo('update SiteConfig');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, SiteConfig $siteconfig): bool
    {
        return $user->checkPermissionTo('delete SiteConfig');
    }

    /**
     * Determine whether the user can delete any models.
     */
    public function deleteAny(User $user): bool
    {
        return $user->checkPermissionTo('delete-any SiteConfig');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, SiteConfig $siteconfig): bool
    {
        return $user->checkPermissionTo('restore SiteConfig');
    }

    /**
     * Determine whether the user can restore any models.
     */
    public function restoreAny(User $user): bool
    {
        return $user->checkPermissionTo('restore-any SiteConfig');
    }

    /**
     * Determine whether the user can replicate the model.
     */
    public function replicate(User $user, SiteConfig $siteconfig): bool
    {
        return $user->checkPermissionTo('replicate SiteConfig');
    }

    /**
     * Determine whether the user can reorder the models.
     */
    public function reorder(User $user): bool
    {
        return $user->checkPermissionTo('reorder SiteConfig');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, SiteConfig $siteconfig): bool
    {
        return $user->checkPermissionTo('force-delete SiteConfig');
    }

    /**
     * Determine whether the user can permanently delete any models.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->checkPermissionTo('force-delete-any SiteConfig');
    }
}
