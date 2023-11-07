<?php

namespace App\Policies;

use App\Enums\Permission\RolePermissionEnum;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePermissionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the admin can view the model.
     *
     * @param  User  $user
     * @return bool
     */
    public function listRoles(User $user)
    {
        return $user->can(RolePermissionEnum::ALL_LIST->value);
    }

    /**
     * Determine whether the admin can create models.
     *
     * @param  User  $user
     * @return bool
     */
    public function createRole(User $user): bool
    {
        return $user->can(RolePermissionEnum::CREATE->value);
    }

    /**
     * Determine whether the admin can update the model.
     *
     * @param  User  $user
     * @param  array  $userData
     * @return bool
     */
    public function updateRole(User $user): bool
    {
        return $user->can(RolePermissionEnum::EDIT->value);
    }

    /**
     * Determine whether the admin can delete the model.
     *
     * @param  User  $user
     * @return bool
     */
    public function deleteRole(User $user): bool
    {
        return $user->can(RolePermissionEnum::DELETE->value);
    }
}
