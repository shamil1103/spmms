@extends('layouts.master')

@section('title')
    Update Role
@endsection


@section('content')
    <div class="main-container container-fluid" style="min-height: 700px">
        <!-- PAGE-HEADER -->

        @component('components.breadcrumb', [
            'menus' => [
                [
                    'name' => 'Role',
                    'url' => route('backend.role.index'),
                ],
                [
                    'name' => 'Update',
                ],
            ],
        ])
            @slot('title')
                Update Role
            @endslot
        @endcomponent

        <!-- PAGE-HEADER END -->
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <form class="login100-form validate-form  @if ($errors->any()) needs-validation was-validated @endif "
                    method="POST" action="{{ route('backend.role.update', ['role' => $role->id]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Update Role</h3>
                        </div>
                        <div class="card-body">
                            @include('admin.setting.role.form')
                        </div>
                        <div class="card-footer text-end">
                            <button type="submit" class="btn btn-success my-1">Update</button>
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
