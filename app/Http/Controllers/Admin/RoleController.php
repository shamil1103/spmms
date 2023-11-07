<?php

namespace App\Http\Controllers\Admin;

use App\Enums\AuthGuardEnum;
use App\Enums\Permission\RolePermissionEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionRequest;
use DataTables;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

    public function index()
    {
        $this->authorize('listRoles', [Permission::class]);

        $data               = [];
        $data['main_menu']  = 'setting';
        $data['child_menu'] = 'role';
        $data['page_title'] = 'Roles ';

        return view('admin.setting.role.index', $data);
    }

    public function getRoles(Request $request): JsonResponse
    {

        $this->authorize('listRoles', [Permission::class]);

        $model = Role::select();

        return DataTables::of($model)
            ->addIndexColumn()
            ->addColumn('permissions', function ($data) {
                $permissions = '';

                if ($data->permissions) {

                    foreach ($data->permissions as $permission) {
                        $permissions .= '<span class="badge bg-success m-1">';
                        $permissions .= $permission->name;
                        $permissions .= '</span>';
                    }

                }

                return $permissions;
            })
            ->addColumn('action', function ($data) {
                $button = "";

                if (auth_user_permission(RolePermissionEnum::EDIT->value)) {
                    $button .= '&nbsp;&nbsp;&nbsp; <a href="' . route('backend.role.edit', $data->id) . '" class="btn btn-success btn-sm" title="Update Role"> <i class="fa fa-edit"></i> </a>';
                }

                if (auth_user_permission(RolePermissionEnum::DELETE->value)) {
                    $button .= '&nbsp;&nbsp;&nbsp; <button class="btn btn-danger btn-sm delete-btn" data-id="' . $data->id . '" data-route="' . route('backend.role.delete') . '" title="Delete Role" > <i class="fa fa-trash"></i> </button>';
                }

                return $button;
            })
            ->rawColumns(['permissions', 'action'])
            ->make(true);
    }

    public function create()
    {
        $this->authorize('createRole', [Permission::class]);

        $data                = [];
        $data['main_menu']   = 'setting';
        $data['child_menu']  = 'role';
        $data['page_title']  = 'Create Role';
        $data['permissions'] = Permission::all()->groupBy('module');

        return view('admin.setting.role.create', $data);
    }

    public function store(PermissionRequest $request)
    {
        $this->authorize('createRole', [Permission::class]);

        $permissions = $request->permissions;
        $name        = $request->name;

        $role = Role::create(['name' => $name, 'guard_name' => AuthGuardEnum::WEB->value]);

        if ($role) {

            if ($role && !empty($permissions)) {
                $role->syncPermissions($permissions);
            }

            setMessage('Role Create Successfully', 'success');

            return redirect()->route('backend.role.index');
        } else {
            setMessage('Role Create Failed', 'danger');

            return redirect()->back()->withInput();
        }

    }

    public function edit(Request $request, Role $role)
    {
        $this->authorize('updateRole', [Permission::class]);

        $role->load('permissions');
        $role->permissions = collect($role->permissions)->pluck('id')->toArray();

        $data                = [];
        $data['main_menu']   = 'setting';
        $data['child_menu']  = 'role';
        $data['page_title']  = 'Edit Admin';
        $data['role']        = $role;
        $data['permissions'] = Permission::all()->groupBy('module');

        return view('admin.setting.role.edit', $data);
    }

    public function update(PermissionRequest $request, Role $role)
    {

        $this->authorize('updateRole', [Permission::class]);

        $permissions = $request->permissions;
        $name        = $request->name;
        $role->update(['name' => $name]);

        if (!empty($permissions)) {
            $role->syncPermissions($permissions);
        }

        setMessage('Role Update Successfully', 'success');

        return redirect()->route('backend.role.index');

    }

    public function delete(Request $request)
    {
        $response = ['error' => 'Error Found'];

        if (auth_user_permission(RolePermissionEnum::DELETE->value)) {

            if ($request->ajax()) {
                $validator = Validator::make($request->all(), [
                    'id' => 'required',
                ]);

                if ($validator->fails()) {
                    $response = ['error' => 'Error Found'];
                } else {
                    $role = Role::findById($request->id, 'admin');

                    $role->delete();

                    if ($role) {
                        $response = ['success' => 'Role Delete Update Successfully'];
                    } else {
                        $response = ['error' => 'Database Error Found'];
                    }

                }

            }

        } else {
            $response = ['error' => 'You are not authorized'];
        }

        return response()->json($response);
    }

}
