<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title')
        {{-- frontend.index --}}
    </title>

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Styles -->

    {{-- <link href="{{ asset('frontend/css/nucleo-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/nucleo-svg.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/material-dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/custom.css') }}" rel="stylesheet"> --}}

    <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/boostrap5.css') }}" rel="stylesheet">

    <link href="{{ asset('frontend/css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/owl.theme.default.min.css') }}" rel="stylesheet">



</head>

<body >
    @include('layouts.inc.frontnavbar')
        {{-- <div class="container-fluid py-4"> --}}
            <div class="content">
                @yield('content')
                {{-- resuorse.frontend.index --}}
            </div>
        {{-- </div>
    --}}

    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}" ></script>
    <script src="{{ asset('frontend/js/jquery-3.6.1.min.js') }}" ></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}" ></script>
    {{-- <script src="{{ asset('admin/js/bootstrap.min.js') }}" defer></script>
    <script src="{{ asset('admin/js/perfect-scrollbar.min.js') }}" defer></script>
    <script src="{{ asset('admin/js/smooth-scrollbar.min.js') }}" defer></script>
    <script src="{{ asset('admin/js/chartjs.min.js') }}" defer></script> --}}
    <!-- Scripts -->

    @yield('scripts')
</body>

</html>
