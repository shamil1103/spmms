@extends('layouts.master')

@section('title')
    Update Client
@endsection


@section('content')
    <div class="main-container container-fluid">
        <!-- PAGE-HEADER -->

        @component('components.breadcrumb', [
            'menus' => [
                [
                    'name' => 'Client',
                    'url' => route('backend.client.index'),
                ],
                [
                    'name' => 'Update',
                ],
            ],
        ])
            @slot('title')
                Update Client
            @endslot
        @endcomponent

        <!-- PAGE-HEADER END -->
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form class="login100-form validate-form  @if ($errors->any()) needs-validation was-validated @endif "
                    method="POST" action="{{ route('backend.client.update', ['client' => $client->id]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Update Client</h3>
                        </div>
                        <div class="card-body">
                            @include('admin.client.form')
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
