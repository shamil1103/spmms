<!DOCTYPE html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-Frame-Options" content="deny">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <meta name="description" content="{{ session()->get('company_name') ?? config('app.name') }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="base-url" content="{{ asset('/') }}">

    @if (session()->get('company_photo') && !empty(session()->get('company_favicon')))
        <!-- FAVICON -->
        <link rel="shortcut icon" type="image/x-icon" href="{{ session()->get('company_favicon') }}">
    @endif


    <title> @yield('title') | {{ session()->get('company_name') ?? config('app.name') }}</title>

    @include('layouts.css-files')

</head>

<body>
    <div class="page home-page">

        <!-- Main Navbar-->
        @include('layouts.topbar')
        <!-- Main Navbar-->

        <div class="page-content d-flex align-items-stretch">

            <!-- Side Navbar -->
            @include('layouts.sidebar')
            <!-- Side Navbar -->

            <div class="content-inner">
                <!-- CONTAINER -->
                @yield('content')
                <!-- CONTAINER -->

                <!-- Page Footer-->
                @include('layouts.footer')
                <!-- Page Footer-->
            </div>
        </div>
    </div>

    @include('layouts.js-files')
</body>

</html>
