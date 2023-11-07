<?php

namespace Database\Seeders;

use App\Enums\AuthGuardEnum;
use App\Enums\Permission\ApplicationPermissionEnum;
use App\Enums\Permission\RolePermissionEnum;
use App\Enums\Permission\UserPermissionEnum;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        \DB::table('role_has_permissions')->truncate();
        \DB::table('model_has_roles')->truncate();
        \DB::table('model_has_permissions')->truncate();
        \DB::table('roles')->truncate();
        \DB::table('permissions')->truncate();

        Schema::enableForeignKeyConstraints();

        // Create Role
        $roleSuperUser = Role::updateOrCreate([
            'name'       => 'Super User',
            'guard_name' => AuthGuardEnum::WEB->value,
        ]);

        $guardName = AuthGuardEnum::WEB->value;
        $modules   = [
            [
                'module'        => 'Settings > User',
                'sorting_order' => 1000,
                'permissions'   => UserPermissionEnum::toArray(),
            ],
            [
                'module'        => 'Settings > Role',
                'sorting_order' => 2000,
                'permissions'   => RolePermissionEnum::toArray(),
            ],
            [
                'module'        => 'Settings > Application',
                'sorting_order' => 3000,
                'permissions'   => ApplicationPermissionEnum::toArray(),
            ],
        ];

        $permissions = [];

        foreach ($modules as $module) {

            foreach ($module['permissions'] as $permission) {
                // ignore existing permission
                $permissionExists = Permission::query()
                    ->where('guard_name', $guardName)
                    ->where('name', $permission)
                    ->exists();

                if (!$permissionExists) {
                    $permissions[] = [
                        'module'        => $module['module'],
                        'sorting_order' => $module['sorting_order'],
                        'name'          => $permission,
                        'guard_name'    => $guardName,
                    ];
                }

            }

        }

        if (!empty($permissions)) {

            foreach ($permissions as $permission) {

                $permission = Permission::create($permission);

                $roleSuperUser->givePermissionTo($permission);
                $permission->assignRole($roleSuperUser);
            }

        }

        $user = User::first();
        $user->assignRole($roleSuperUser);

    }

}
