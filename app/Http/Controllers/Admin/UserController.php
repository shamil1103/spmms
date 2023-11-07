<?php

namespace App\Http\Controllers\Admin;

use App\Enums\CommonStatusEnum;
use App\Enums\MediaDirectoryEnum;
use App\Enums\Permission\UserPermissionEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return View
     * @throws AuthorizationException
     */
    public function index(): View
    {
        $this->authorize('listUsers', [User::class]);

        $data               = [];
        $data['main_menu']  = 'setting';
        $data['child_menu'] = 'user';
        $data['page_title'] = 'Users';

        return view('admin.setting.user.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function getUsers(Request $request): JsonResponse
    {
        $this->authorize('listUsers', [User::class]);

        $model = User::select();

        return DataTables::of($model)
            ->addIndexColumn()
            ->addColumn('role', function ($data) {
                $roles = '';

                if ($data->roles) {

                    foreach ($data->roles as $role) {
                        $roles .= '<span class="badge bg-success m-1">';
                        $roles .= $role->name;
                        $roles .= '</span>';
                    }

                }

                return $roles;
            })
            ->addColumn('image', function ($data) {
                $image = "";

                if (!empty($data->image)) {
                    $image = ' <img src="' . $data->image_path . '" class="img-fluid img-thumbnail" style="height: 55px !important; width: 100px !important;" alt="User Photo">';
                }

                return $image;
            })
            ->addColumn('status', function ($data) {

                if ($data->status->value == CommonStatusEnum::ACTIVE->value) {
                    $class = "success";

                } else {
                    $class = "danger";
                }

                return '<span class="text-bold text-' . $class . ' row-status" style="font-size:20px;" > ' . $data->status->value . '</span>';

            })
            ->addColumn('action', function ($data) {
                $button = "";

                if ($data->id != auth()->user()->id) {

                    if ($data->status->value == CommonStatusEnum::ACTIVE->value) {

                        if (auth_user_permission(UserPermissionEnum::ACTIVATE->value)) {
                            $button .= '<button class="btn btn-danger btn-sm updateStatus" data-toggle="modal" data-target="#viewModal" data-id="' . $data->id . '" data-status="' . CommonStatusEnum::IN_ACTIVE->value . '" data-route="' . route('backend.user.updateStatus') . '" title="Update User Status"><i class="fa fa-arrow-circle-down"></i> </button>';
                        }

                    } else {

                        if (auth_user_permission(UserPermissionEnum::INACTIVATE->value)) {
                            $button .= '<button class="btn btn-success btn-sm updateStatus" data-toggle="modal" data-target="#viewModal" data-id="' . $data->id . '" data-status="' . CommonStatusEnum::ACTIVE->value . '" data-route="' . route('backend.user.updateStatus') . '" title="Update User Status" > <i class="fa fa-arrow-circle-up"></i> </button>';
                        }

                    }

                }

                if (auth_user_permission(UserPermissionEnum::READ->value)) {
                    $button .= '&nbsp;&nbsp;&nbsp; <button class="btn btn-secondary btn-sm view-modal"  data-route="' . route('backend.user.show', ['user' => $data->id]) . '" title="View User" > <i class="fa fa-eye"></i> </button>';
                }

                if (auth_user_permission(UserPermissionEnum::EDIT->value)) {
                    $button .= '&nbsp;&nbsp;&nbsp; <a href="' . route('backend.user.edit', $data->id) . '" class="btn btn-success btn-sm" title="Update User"> <i class="fa fa-edit"></i> </a>';
                }

                if ($data->id != auth()->user()->id) {

                    if (auth_user_permission(UserPermissionEnum::DELETE->value)) {
                        $button .= '&nbsp;&nbsp;&nbsp; <button class="btn btn-danger btn-sm delete-btn" data-id="' . $data->id . '" data-route="' . route('backend.user.delete') . '" title="Delete User" > <i class="fa fa-trash"></i> </button>';
                    }

                }

                return $button;
            })
            ->rawColumns(['role', 'status', 'action', 'image'])
            ->make(true);
    }

    /**
     *  Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return View
     * @throws AuthorizationException
     */
    public function create(): View
    {
        $this->authorize('createUser', [User::class]);

        $data               = [];
        $data['main_menu']  = 'setting';
        $data['child_menu'] = 'user';
        $data['roles']      = Role::all();
        $data['page_title'] = 'Create User';

        return view('admin.setting.user.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  UserRequest  $request
     * @return RedirectResponse
     * @throws AuthorizationException
     * @throws Exception
     */
    public function store(UserRequest $request): RedirectResponse
    {
        $this->authorize('createUser', [User::class]);

        $image_name = null;

        if ($request->hasFile('image')) {
            $image_name = uploadFile($request->file('image'), MediaDirectoryEnum::USER->value);
        }

        $password = $request->input('password') ?? 123456;

        $data = [
            'name'     => $request->input('name'),
            'email'    => $request->input('email'),
            'password' => bcrypt($password),
            'image'    => $image_name,
            'status'   => CommonStatusEnum::ACTIVE->value,
        ];

        $user = User::create($data);

        if ($user) {
            $user->syncRoles($request->roles);
            setMessage('User Create Successfully', 'success');

            return redirect()->route('backend.user.index');
        } else {
            setMessage('User Create Failed', 'danger');

            return redirect()->back()->withInput();
        }

    }

    /**
     * Store a show resource.
     *
     * @param  Request  $request
     * @return View
     * @throws AuthorizationException
     */
    public function show(Request $request, User $user): View
    {
        $this->authorize('viewAnyUser', [User::class]);

        return view('admin.setting.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  User  $user
     * @return View
     * @throws AuthorizationException
     */
    public function edit(Request $request, User $user): View
    {
        $this->authorize('updateUser', [User::class]);

        $user->load('roles');
        $user->roles = collect($user->roles)->pluck('id')->toArray();

        $data               = [];
        $data['main_menu']  = 'setting';
        $data['child_menu'] = 'user';
        $data['page_title'] = 'Edit User';
        $data['roles']      = Role::all();
        $data['user']       = $user;

        return view('admin.setting.user.edit', $data);
    }

    /**
     * * Update the specified resource in storage.
     *
     * @param  UserRequest  $request
     * @param  int  $id
     * @return RedirectResponse
     * @throws AuthorizationException
     * @throws Exception
     */
    public function update(UserRequest $request, int $id): RedirectResponse
    {

        $this->authorize('updateUser', [User::class]);

        $user = User::findOrFail($id);

        $image_name = $user->image;

        if ($request->hasFile('image')) {
            $image_name = uploadFile($request->file('image'), MediaDirectoryEnum::USER->value);
            removeFile($user->image, MediaDirectoryEnum::USER->value);
        }

        $data = [
            'name'  => $request->input('name'),
            'email' => $request->input('email'),
            'image' => $image_name,
        ];

        if (!empty($request->password)) {
            $data['password'] = bcrypt($request->input('password'));
        }

        $check = $user->update($data) ? true : false;

        $user->syncRoles($request->roles);

        if ($check) {
            setMessage('User Update Successfully', 'success');

            return redirect()->route('backend.user.index');
        } else {
            setMessage('User Update Failed', 'danger');

            return redirect()->back()->withInput();
        }

    }

    /**
     * * Update status the specified resource in storage.
     *
     * @param  Request  $request
     * @return JsonResponse
     */
    public function updateStatus(Request $request): JsonResponse
    {
        $response = [
            'error' => 'Error Found',
        ];

        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'id'     => 'required',
                'status' => 'required',
            ]);

            if ($validator->fails()) {
                $response = [
                    'error' => 'Validation Error Found',
                ];
            } else {
                $status = CommonStatusEnum::tryFrom($request->status);

                if ($status) {

                    $check = User::where('id', $request->id)->update(['status' => $status->value]) ? true : false;

                    if ($check) {
                        $response = [
                            'success'    => 'User Status Update Successfully',
                            'status'     => $status->value == CommonStatusEnum::ACTIVE->value ? CommonStatusEnum::ACTIVE->value : CommonStatusEnum::IN_ACTIVE->value,
                            'permission' => false,
                        ];

                        $auth  = auth()->user();

                        if ($auth->email == defaultUser() || $auth->can(UserPermissionEnum::ACTIVATE->value)  ||$auth->can(UserPermissionEnum::INACTIVATE->value)){
                            $response['permission'] = true;
                        }

                    } else {
                        $response = [
                            'error' => 'Database Error Found',
                        ];
                    }

                }

            }

        }

        return response()->json($response);
    }

    /**
     * Remove batch of resources from storage.
     *
     * @param  Request  $request
     * @return JsonResponse
     */
    public function delete(Request $request): JsonResponse
    {

        $response = ['error' => 'Error Found'];

        if (auth_user_permission(UserPermissionEnum::DELETE->value)) {

            if ($request->ajax()) {
                $validator = Validator::make($request->all(), [
                    'id' => 'required',
                ]);

                if ($validator->fails()) {
                    $response = ['error' => 'Error Found'];
                } else {
                    $user = User::where('id', $request->id)->first();

                    if ($user) {
                        removeFile($user->image, MediaDirectoryEnum::USER->value);

                        $user->roles()->detach();
                        $user->delete();
                        $response = ['success' => 'User Delete Update Successfully'];
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
