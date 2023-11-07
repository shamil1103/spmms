<?php

namespace App\Http\Controllers\Admin;

use App\Enums\MediaDirectoryEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\ApplicationRequest;
use App\Models\Application;

class ApplicationController extends Controller
{
    public function index()
    {
        $this->authorize('viewApplication', [Application::class]);

        $data                = [];
        $data['main_menu']   = 'setting';
        $data['child_menu']  = 'application';
        $data['page_title']  = 'Application ';
        $data['application'] = Application::first();

        return view('admin.setting.application.index', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Application $application)
    {
        $this->authorize('updateApplication', [Application::class]);

        $data                = [];
        $data['main_menu']   = 'setting';
        $data['child_menu']  = 'application';
        $data['page_title']  = 'Edit Application';
        $data['application'] = $application;

        return view('admin.setting.application.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ApplicationRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ApplicationRequest $request, Application $application)
    {
        $this->authorize('updateApplication', [Application::class]);

        if ($request->hasFile('photo')) {
            $photo_name = uploadFile($request->file('photo'), MediaDirectoryEnum::APPLICATION->value);
            removeFile($application->image, MediaDirectoryEnum::APPLICATION->value);
        } else {
            $photo_name = $application->photo;
        }

        if ($request->hasFile('favicon')) {
            $favicon_name = uploadFile($request->file('favicon'), MediaDirectoryEnum::APPLICATION->value);
            removeFile($application->favicon, MediaDirectoryEnum::APPLICATION->value);
        } else {
            $favicon_name = $application->favicon;
        }

        $data = [
            'name'           => $request->input('name'),
            'email'          => $request->input('email'),
            'contact_number' => $request->input('contact_number'),
            'address'        => $request->input('address'),
            'photo'          => $photo_name,
            'favicon'        => $favicon_name,
            'user_id'        => auth()->id(),
        ];

        $check = $application->update($data) ? true : false;

        if ($check) {

            $session_data = [
                'company_name'           => $data['name'],
                'company_email'          => $data['email'],
                'company_address'        => $data['address'],
                'company_contact_number' => $data['contact_number'],
                'company_photo'          => $application->photo_path,
                'company_favicon'        => $application->favicon_path,
            ];
            session()->put($session_data);

            setMessage('Application Update Successfully', 'success');

            return redirect()->route('backend.application.index');
        } else {
            setMessage('Application Update Failed', 'danger');

            return redirect()->back()->withInput();
        }

    }

}
