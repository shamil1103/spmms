@php
    use App\Enums\Permission\ClientPermissionEnum;
    $authUser = auth()->user();
    $defaultUser = $authUser->email == defaultUser();
@endphp

@extends('layouts.master')

@section('title')
    Client
@endsection


@section('content')
    <div class="main-container container-fluid">
        <!-- PAGE-HEADER -->

        @component('components.breadcrumb', [
            'menus' => [
                [
                    'name' => 'Client',
                ],
            ],
        ])
            @slot('title')
                Client
            @endslot
        @endcomponent

        <!-- PAGE-HEADER END -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="card-title">Client</div>
                        @if ($authUser->can(ClientPermissionEnum::CREATE->value) || $defaultUser)
                            <a href="{{ route('backend.client.create') }}" class="btn btn-primary" title="Create User">
                                <i class="fe fe-edit"></i>
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
                                        <th>Contact Number</th>
                                        <th>Address</th>
                                        <th>Status</th>
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
                language: {
                    processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> '
                },
                processing: true,
                serverSide: true,
                ajax: '{!! route('backend.client.getClients') !!}',
                columns: [{
                        data: 'DT_RowIndex',
                        orderable: false,
                        searchable: false,
                        class: "text-center"
                    },
                    {
                        data: 'name',
                        name: 'name',
                        class: "text-center"
                    },
                    {
                        data: 'contact_number',
                        name: 'contact_number',
                        class: "text-center"
                    },
                    {
                        data: 'address',
                        name: 'address',
                        class: "text-center"
                    },
                    {
                        data: 'status',
                        name: 'status',
                        class: "text-center"
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        class: "text-center"
                    }
                ]
            });
        });
    </script>
@endpush
