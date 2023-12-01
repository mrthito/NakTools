<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="author" content="NakTools">
    <title>{{ $title }} :: {{ config('app.name', 'NakTools') }}</title>
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="{{ asset('assets/vendors/simplebar/css/simplebar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/simplebar/css/simplebar.css') }}">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/examples.css') }}" rel="stylesheet">
</head>

<body>
    <div class="bg-light min-vh-100 d-flex flex-row align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="card-group d-block d-md-flex row">
                        <div class="card col-md-7 p-4 mb-0">
                            {{ $slot }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/vendors/@coreui/coreui/js/coreui.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/simplebar/js/simplebar.min.js') }}"></script>
    <script></script>

</body>

</html>
