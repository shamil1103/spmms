<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Enums\AuthGuardEnum;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Permission;
use App\Policies\RolePermissionPolicy;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Permission::class => RolePermissionPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {

        // Implicitly grant "Super Admin" all permissions
        // This works in the app by using gate-related functions like auth()->user->can() and @can()
        Gate::before(function ($user, $ability) {

            if ($user->email == defaultUser()) {
                return true;
            }

            if (!Permission::getPermission(['name' => $ability, 'guard_name' => AuthGuardEnum::ADMIN->value])) {
                return null;
            }

            return true;
        });
    }

}
