<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="author" content="NakTools">
    <title>{{ $title }} :: {{ config('app.name', 'NakTools') }} {{ __('Superadmin') }}</title>
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="{{ asset('assets/vendors/simplebar/css/simplebar.css') }}">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/examples.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendors/@coreui/chartjs/css/coreui-chartjs.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendors/@coreui/icons/css/free.min.css') }}" rel="stylesheet">
</head>

<body>
    @include('layouts.superadmin.sidebar')
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
        @include('layouts.superadmin.header')
        <div class="body flex-grow-1 px-3">
            {{ $slot }}
        </div>
        <footer class="footer">
            <div>
                &copy; {{ date('Y') <= 2023 ? '2023' : '2023 - ' . date('Y') }} {{ config('app.name') }}.
            </div>
            <div class="ms-auto">
                Dashboard by CoreUI
            </div>
        </footer>
    </div>
    <script src="{{ asset('assets/vendors/@coreui/coreui/js/coreui.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/chart.js/js/chart.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/@coreui/chartjs/js/coreui-chartjs.js') }}"></script>
    <script src="{{ asset('assets/vendors/@coreui/utils/js/coreui-utils.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script></script>

</body>

</html>
