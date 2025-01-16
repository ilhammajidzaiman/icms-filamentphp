<?php

namespace App\Policies\Media;

use App\Models\User;
use App\Models\Media\Video;
use Illuminate\Auth\Access\HandlesAuthorization;

class VideoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_media::video');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Video $video): bool
    {
        return $user->can('view_media::video');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create_media::video');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Video $video): bool
    {
        return $user->can('update_media::video');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Video $video): bool
    {
        return $user->can('delete_media::video');
    }

    /**
     * Determine whether the user can bulk delete.
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_media::video');
    }

    /**
     * Determine whether the user can permanently delete.
     */
    public function forceDelete(User $user, Video $video): bool
    {
        return $user->can('force_delete_media::video');
    }

    /**
     * Determine whether the user can permanently bulk delete.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force_delete_any_media::video');
    }

    /**
     * Determine whether the user can restore.
     */
    public function restore(User $user, Video $video): bool
    {
        return $user->can('restore_media::video');
    }

    /**
     * Determine whether the user can bulk restore.
     */
    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any_media::video');
    }

    /**
     * Determine whether the user can replicate.
     */
    public function replicate(User $user, Video $video): bool
    {
        return $user->can('replicate_media::video');
    }

    /**
     * Determine whether the user can reorder.
     */
    public function reorder(User $user): bool
    {
        return $user->can('reorder_media::video');
    }
}
