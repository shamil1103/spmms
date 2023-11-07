<?php

namespace App\Policies;

use App\Enums\CommonStatusEnum;
use App\Enums\Permission\UserPermissionEnum;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the admin can view the model.
     *
     * @param  User  $user
     * @return bool
     */
    public function listUsers(User $user)
    {
        return $user->can(UserPermissionEnum::ALL_LIST->value);
    }

    /**
     * Determine whether the admin can create models.
     *
     * @param  User  $user
     * @return bool
     */
    public function createUser(User $user): bool
    {
        return $user->can(UserPermissionEnum::CREATE->value);
    }

    /**
     * Determine whether the admin can update the model.
     *
     * @param  User  $user
     * @param  array  $userData
     * @return bool
     */
    public function updateUser(User $user): bool
    {
        return $user->can(UserPermissionEnum::EDIT->value);
    }

    /**
     * Determine whether the admin can view the model.
     *
     * @param  User  $user
     * @return bool
     */
    public function viewAnyUser(User $user): bool
    {
        return $user->can(UserPermissionEnum::READ->value);
    }

    /**
     * Determine whether the admin can activate the model.
     *
     * @param  User  $user
     * @param  array  $userData
     * @return bool
     */
    public function activateUser(User $user, array $userData): bool
    {
        return $user->can(UserPermissionEnum::ACTIVATE->value) && $userData['status'] === CommonStatusEnum::IN_ACTIVE->value;
    }

    /**
     * Determine whether the admin can inactive the model.
     *
     * @param  User  $user
     * @return bool
     */
    public function inactivateUser(User $user, array $userData): bool
    {
        return ($user->can(UserPermissionEnum::INACTIVATE->value) && $userData['status'] === CommonStatusEnum::ACTIVE->value);
    }

    /**
     * Determine whether the admin can delete the model.
     *
     * @param  User  $user
     * @return bool
     */
    public function deleteUser(User $user): bool
    {
        return $user->can(UserPermissionEnum::DELETE->value);
    }
}
