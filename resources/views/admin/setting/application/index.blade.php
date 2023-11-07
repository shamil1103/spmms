@extends('layouts.master')

@section('title')
    Application
@endsection


@section('content')
    @component('components.breadcrumb', [
        'menus' => [
            [
                'name' => 'Application',
            ],
        ],
    ])
        @slot('title')
            Application
        @endslot
    @endcomponent

    <div class="main-container container-fluid">
        <!-- PAGE-HEADER -->


        <!-- PAGE-HEADER END -->
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="card-title">Application</div>
                        <a href="{{ route('backend.application.edit', $application->id) }}" class="btn btn-primary"
                            title="Create">
                            <i class="fe fe-edit"></i>
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="mt-4 text-center">
                            <img src="{{ $application->photo_path }}" alt="img" class="br-5"
                                style="hight: 100px; width: 180px" />
                        </div>
                        <div class="col-8 offset-2">
                            <div class="d-flex align-items-center mb-3 mt-3">
                                <h5>{{ $application->name }}</h5>
                            </div>

                            <div class="d-flex align-items-center mb-3 mt-3">
                                <div class="me-4 text-center text-primary"> <span><i class="fe fe-mail fs-20"></i></span>
                                </div>
                                <div> <strong>{{ $application->email }}</strong> </div>
                            </div>

                            <div class="d-flex align-items-center mb-3 mt-3">
                                <div class="me-4 text-center text-primary"> <span><i class="fe fe-phone fs-20"></i></span>
                                </div>
                                <div> <strong>{{ $application->contact_number }}</strong> </div>
                            </div>

                            <div class="d-flex align-items-center mb-3 mt-3">
                                <div class="me-4 text-center text-primary"> <span><i class="fe fe-map-pin fs-20"></i></span>
                                </div>
                                <div> <strong>{{ $application->address }}</strong> </div>
                            </div>
                            @if ($application->favicon_path)
                                <div class="d-flex align-items-center mb-3 mt-3">
                                    <div class="me-4 text-center text-primary"> <span><i
                                                class="fe fe-camera fs-20"></i></span>
                                    </div>
                                    <div>
                                        <img src="{{ $application->favicon_path }}" alt="img" class="br-5"
                                            style="hight: 40px; width: 60px" />
                                    </div>
                                </div>
                            @endif
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
@endpush
