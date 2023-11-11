@php
    use App\Enums\Permission\RolePermissionEnum;
    $authUser = auth()->user();
    $defaultUser = $authUser->email == defaultUser();
@endphp


@extends('layouts.master')

@section('title')
    Role
@endsection


@section('content')
    <div class="main-container container-fluid" style="min-height: 700px">
        <!-- PAGE-HEADER -->

        @component('components.breadcrumb', [
            'menus' => [
                [
                    'name' => 'Role',
                ],
            ],
        ])
            @slot('title')
                Role
            @endslot
        @endcomponent

        <!-- PAGE-HEADER END -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="card-title">Role</div>
                        @if ($authUser->can(RolePermissionEnum::CREATE->value) || $defaultUser)
                            <a href="{{ route('backend.role.create') }}" class="btn btn-primary" title="Create Role">
                                <i class="fa fa-edit"></i>
                            </a>
                        @endif
                    </div>
                    <div class="card-body" style="min-height: 100px">
                        <div class="table-responsive">
                            <table class="table table-hover" id="yajraDatatable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Permission</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
@endpush

@push('js')
<script>
    $(window).on('load', function() {
        var table = $('#yajraDatatable').DataTable({
            language : {
                processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> '
            },
            processing: true,
            serverSide: true,
            ajax: '{!! route('backend.role.getRoles') !!}',
            columns: [
                { data: 'DT_RowIndex', orderable: false , searchable: false, class : "text-center"},
                { data: 'name', name: 'name' , class : "text-center"},
                { data: 'permissions', name: 'permissions', class : "text-center" },
                { data: 'action', name: 'action', orderable: false , class : "text-center"}
            ]
        });
    });
  </script>
@endpush
