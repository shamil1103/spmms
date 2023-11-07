@extends('layouts.master')

@section('title')
    Dashboard
@endsection


@section('content')
    @component('components.breadcrumb', [
        'menus' => [
            [
                'name' => 'Dashboard',
            ],
        ],
    ])
        @slot('title')
            Dashboard
        @endslot
    @endcomponent

    <!-- Dashboard Counts Section-->
    <section class="dashboard-counts no-padding-bottom">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-4 col-sm-6">
                    <div class="bg-white has-shadow">
                        <div class="item text-center">
                            <a href="pourosova-filter.html">
                                <div class="icon bg-yellow">
                                    <i class="fas fa-building"></i>
                                </div>
                                <div class="title">
                                    <div class="number">
                                        <strong> পৌরসভা </strong>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-sm-6">
                    <div class="bg-white has-shadow">
                        <div class="item text-center">
                            <a href="#">
                                <div class="icon bg-violet">
                                    <i class=""> ১০ </i>
                                </div>
                                <div class="title">
                                    <div class="number">
                                        <strong> মোট প্রকল্প </strong>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-sm-6">
                    <div class="bg-white has-shadow">
                        <div class="item text-center">
                            <a href="#">
                                <div class="icon bg-primary">
                                    <i class="fas fa-handshake text-white"></i>
                                </div>
                                <div class="title">
                                    <div class="number">
                                        <strong> মিটিং </strong>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
            <br />
            <div class="row text-center">
                <div class="col-xl-4 col-sm-6">
                    <div class="bg-white has-shadow">
                        <div class="item text-center">
                            <a href="#">
                                <div class="icon bg-danger">
                                    <i class="fas fa-envelope text-white"></i>
                                </div>
                                <div class="title">
                                    <div class="number">
                                        <strong> অভিযোগ </strong>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6">
                    <div class="bg-white has-shadow">
                        <div class="item text-center">
                            <a href="#">
                                <div class="icon bg-green">
                                    <i class="fas fa-tasks"></i>
                                </div>
                                <div class="title">
                                    <div class="number">
                                        <strong> অভিযোগের অগ্রগতি </strong>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6">
                    <div class="bg-white has-shadow">
                        <div class="item text-center">
                            <a href="#">
                                <div class="icon bg-orange">
                                    <i class="fas fa-address-card"></i>
                                </div>
                                <div class="title">
                                    <!-- <span>মোট  -->
                                    <!-- <small>গ্রাহক</small></span> -->
                                    <div class="number">
                                        <strong>অ্যাপ সম্পর্কে </strong>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- </br> -->
            <!-- </br> -->
        </div>
    </section>
    <!-- Dashboard Counts Section-->
    <!-- Dashboard Header Section    -->
    <section class="dashboard-header">
        <div class="container-fluid">
            <div class="row">
                <div class="chart col-lg-12 col-12">
                    <div class="bar-chart has-shadow bg-white">
                        <div class="p-3">
                            <div class="title">
                                <strong class="text-violet">মাসিক হারে প্রকল্প গ্রহন </strong><br>
                            </div>
                            <canvas id="barChartHome"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Dashboard Header Section    -->
@endsection

@push('css')
@endpush

@push('js')
    <script></script>
@endpush
