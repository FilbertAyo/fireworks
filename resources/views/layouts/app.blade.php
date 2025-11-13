<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Kenseep Executive fireworks</title>

    <link href="{{ asset('assets/images/icon-deal.png') }}" rel="icon">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('backend/assets/css/styles.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('toastr/css/toastr.min.css') }}">
</head>

<body class="font-sans antialiased bg-light">


    @if (Auth::check() && Auth::user()->hasRole('customer'))
        <script>
            window.location.href = "{{ url()->previous() }}";
        </script>
    @elseif(Auth::check() && Auth::user()->user_status == 'blocked')

    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="alert alert-danger text-center px-5" role="alert">
            <h4 class="alert-heading">Your account is blocked</h4>
            <p>Please contact the administrator for more information.</p>
        </div>
    </div>

    @else
        @include('elements.toastr')
        {{ $slot }}
    @endif




    <script src="{{ asset('backend/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('backend/assets/js/app.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/simplebar/dist/simplebar.js') }}"></script>
{{-- Toaster  --}}
    <script src="{{ asset('toastr/global.min.js') }}"></script>
    <script src="{{ asset('toastr/quixnav-init.js') }}"></script>
    <script src="{{ asset('toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('toastr/toastr-init.js') }}"></script>

</body>

</html>
