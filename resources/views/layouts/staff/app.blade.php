<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="author" content="NakTools">
    <title>{{ $title }} :: {{ config('app.name', 'NakTools') }} {{ __('Staff') }}</title>
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="{{ asset('assets/vendors/simplebar/css/simplebar.css') }}">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/examples.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendors/@coreui/chartjs/css/coreui-chartjs.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendors/@coreui/icons/css/free.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    @include('layouts.staff.sidebar')
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
        @include('layouts.staff.header')
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
    <script>
            @if(session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: '{{ session('success') }}',
                    showConfirmButton: false,
                    timer: 3000
                });
            @endif
            @if(session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: '{{ session('error') }}',
                    showConfirmButton: false,
                    timer: 3000
                });
            @endif

            @if($errors->any())
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: '{{ $errors->first() }}',
                    showConfirmButton: false,
                    timer: 3000
                });
            @endif

            // convert above jquery code to vanilla javascript
            document.querySelectorAll('.btn-delete').forEach(function(element) {
                element.addEventListener('click', function(e) {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You want to delete this item?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Yes, delete it!',
                        cancelButtonText: 'No, cancel!',
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            element.closest('form').submit();
                        }
                    });
                });
            });

            document.querySelectorAll('.btn-restore').forEach(function(element) {
                element.addEventListener('click', function(e) {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You want to restore this item?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Yes, restore it!',
                        cancelButtonText: 'No, cancel!',
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            element.closest('form').submit();
                        }
                    });
                });
            });
    </script>

    @yield('scripts')

</body>

</html>
