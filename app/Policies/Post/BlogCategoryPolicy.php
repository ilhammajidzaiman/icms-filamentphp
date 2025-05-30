<?php

namespace App\Policies\Post;

use App\Models\User;
use App\Models\Post\BlogCategory;
use Illuminate\Auth\Access\HandlesAuthorization;

class BlogCategoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_post::blog::category');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, BlogCategory $blogCategory): bool
    {
        return $user->can('view_post::blog::category');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create_post::blog::category');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, BlogCategory $blogCategory): bool
    {
        return $user->can('update_post::blog::category');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, BlogCategory $blogCategory): bool
    {
        return $user->can('delete_post::blog::category');
    }

    /**
     * Determine whether the user can bulk delete.
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_post::blog::category');
    }

    /**
     * Determine whether the user can permanently delete.
     */
    public function forceDelete(User $user, BlogCategory $blogCategory): bool
    {
        return $user->can('force_delete_post::blog::category');
    }

    /**
     * Determine whether the user can permanently bulk delete.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force_delete_any_post::blog::category');
    }

    /**
     * Determine whether the user can restore.
     */
    public function restore(User $user, BlogCategory $blogCategory): bool
    {
        return $user->can('restore_post::blog::category');
    }

    /**
     * Determine whether the user can bulk restore.
     */
    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any_post::blog::category');
    }

    /**
     * Determine whether the user can replicate.
     */
    public function replicate(User $user, BlogCategory $blogCategory): bool
    {
        return $user->can('replicate_post::blog::category');
    }

    /**
     * Determine whether the user can reorder.
     */
    public function reorder(User $user): bool
    {
        return $user->can('reorder_post::blog::category');
    }
}
