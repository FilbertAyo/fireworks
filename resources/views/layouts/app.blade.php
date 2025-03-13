<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Kenseep Executive fireworks</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="shortcut icon" type="image/png" href="backend/assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="{{ asset('backend/assets/css/styles.min.css') }}" />

    <style>
        /* Full-screen loader */
        #loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: white;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            /* Ensure it's above all content */
        }

        /* Loader spinner */
        .spinner-border {
            width: 4rem;
            height: 4rem;
            border-width: 5px;
        }

        /* Hide content initially */
        #content {
            display: none;
            text-align: center;
            padding: 20px;
        }
    </style>
</head>

<body class="font-sans antialiased">

    @if (Auth::check() && Auth::user()->userType == '2')
        <script>
            window.location.href = "{{ url()->previous() }}";
        </script>
    @else
        {{ $slot }}
    @endif


    <!-- Loader -->
    <div id="loader">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>

    <script>
        window.onload = function() {
            setTimeout(() => {
                document.getElementById("loader").style.display = "none";
                document.getElementById("content").style.display = "block";
            }, 1000);
        };
    </script>

    <script src="{{ asset('backend/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('backend/assets/js/app.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/simplebar/dist/simplebar.js') }}"></script>
    {{-- <script src="{{ asset('backend/assets/js/dashboard.js') }}"></script> --}}
</body>

</html>
