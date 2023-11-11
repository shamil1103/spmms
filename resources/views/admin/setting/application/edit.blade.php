@extends('layouts.master')

@section('title')
    Update Application
@endsection


@section('content')
    <div class="main-container container-fluid" style="min-height: 700px">
        <!-- PAGE-HEADER -->

        @component('components.breadcrumb', [
            'menus' => [
                [
                    'name' => 'Application',
                    'url' => route('backend.application.index'),
                ],
                [
                    'name' => 'Update',
                ],
            ],
        ])
            @slot('title')
                Update Application
            @endslot
        @endcomponent

        <!-- PAGE-HEADER END -->
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form
                    class="login100-form validate-form  @if ($errors->any()) needs-validation was-validated @endif "
                    method="POST" action="{{ route('backend.application.update', ['application' => $application->id]) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Update Application</h3>
                        </div>
                        <div class="card-body">

                            <div class="form-group mb-3">
                                <label for="name">Name  <span class="text-danger">*</span></label>
                                <input type="text" name="name" id="name"
                                    value="{{ old('name', $application->name) ?? null }}"
                                    class="form-control  @error('name') is-invalid @enderror " placeholder="Name"
                                    aria-label="Name" aria-describedby="basic-addon1" required>
                                @error('name')
                                    <div class="text-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="contact_number">Contact Number  <span class="text-danger">*</span></label>
                                <input type="text" name="contact_number" id="contact_number"
                                    value="{{ old('contact_number', $application->contact_number) ?? null }}"
                                    class="form-control @error('contact_number') is-invalid @enderror "
                                    placeholder="Contact Number" aria-label="Contact Number" aria-describedby="basic-addon1"
                                    required>
                                @error('contact_number')
                                    <div class="text-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="email">Email  <span class="text-danger">*</span></label>
                                <input type="email" name="email" id="email"
                                    value="{{ old('email', $application->email) ?? null }}"
                                    class="form-control @error('email') is-invalid @enderror " placeholder="Email"
                                    aria-label="Email" aria-describedby="basic-addon1" required>
                                @error('email')
                                    <div class="text-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="address">Address  <span class="text-danger">*</span></label>
                                <textarea name="address" id="address"
                                    class="form-control @error('address') is-invalid @enderror " placeholder="Address" aria-label="Address"
                                    aria-describedby="basic-addon1" required>{{ old('address', $application->address) ?? null }}</textarea>
                                @error('address')
                                    <div class="text-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label mt-0">Photo</label>
                                <input type="file" name="photo" id="photo" class="form-control file-preview @error('photo') is-invalid @enderror" accept="image/*"  data-previewDiv="preview_file_photo">
                                <div id="preview_file_photo" style="margin-top: 10px;">
                                    @if ($application->photo != null)
                                            <img src="{{ $application->photo_path }}" class="img-fluid img-thumbnail" style="height: 100px" alt="Application  Photo">
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label mt-0">Favicon</label>
                                <input type="file" name="favicon" id="favicon" class="form-control file-preview @error('favicon') is-invalid @enderror" accept="image/*"  data-previewDiv="preview_file_favicon">
                                <div id="preview_file_favicon" style="margin-top: 10px;">
                                    @if ($application->favicon != null)
                                            <img src="{{ $application->favicon_path }}" class="img-fluid img-thumbnail" style="height: 100px" alt="Application  Favicon">
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button type="submit" class="btn btn-success my-1">Save</button>
                            <button type="reset" class="btn btn-danger my-1">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('css')
@endpush

@push('js')
@endpush
