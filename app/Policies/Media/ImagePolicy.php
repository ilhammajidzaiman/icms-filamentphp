<?php

namespace App\Policies\Media;

use App\Models\User;
use App\Models\Media\Image;
use Illuminate\Auth\Access\HandlesAuthorization;

class ImagePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_media::image');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Image $image): bool
    {
        return $user->can('view_media::image');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create_media::image');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Image $image): bool
    {
        return $user->can('update_media::image');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Image $image): bool
    {
        return $user->can('delete_media::image');
    }

    /**
     * Determine whether the user can bulk delete.
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_media::image');
    }

    /**
     * Determine whether the user can permanently delete.
     */
    public function forceDelete(User $user, Image $image): bool
    {
        return $user->can('force_delete_media::image');
    }

    /**
     * Determine whether the user can permanently bulk delete.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force_delete_any_media::image');
    }

    /**
     * Determine whether the user can restore.
     */
    public function restore(User $user, Image $image): bool
    {
        return $user->can('restore_media::image');
    }

    /**
     * Determine whether the user can bulk restore.
     */
    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any_media::image');
    }

    /**
     * Determine whether the user can replicate.
     */
    public function replicate(User $user, Image $image): bool
    {
        return $user->can('replicate_media::image');
    }

    /**
     * Determine whether the user can reorder.
     */
    public function reorder(User $user): bool
    {
        return $user->can('reorder_media::image');
    }
}
