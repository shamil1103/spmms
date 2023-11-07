<?php

namespace App\Policies;

use App\Enums\Permission\ApplicationPermissionEnum;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ApplicationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the admin can update the model.
     *
     * @param  User  $user
     * @return bool
     */
    public function updateApplication(User $user): bool
    {
        return $user->can(ApplicationPermissionEnum::EDIT->value);
    }

    /**
     * Determine whether the admin can view the model.
     *
     * @param  User  $user
     * @return bool
     */
    public function viewApplication(User $user): bool
    {
        return $user->can(ApplicationPermissionEnum::READ->value);
    }

}
