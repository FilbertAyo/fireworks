<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'KENSEEP EXECUTIVE FIREWORKS')</title>

    <!-- ======= Google Font =======-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <!-- End Google Font-->

    <!-- ======= Icon Fonts =======-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
          integrity="sha512-nMTAFp4x2j2k93A5dSIhdISwHtIlTLQZHsFMyFmwWe29WRT9lWqNcC+4jI0ahk3kGm5wvmiU9P+YKa+H0P+log=="
          crossorigin="anonymous" referrerpolicy="no-referrer">
    <!-- End Icon Fonts -->

    <!-- ======= Styles =======-->
    <link href="{{ asset('assets/vendors/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendors/bootstrap-icons/font/bootstrap-icons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendors/glightbox/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendors/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendors/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <!-- End Styles-->

    @stack('styles')

    <!-- ======= Apply theme =======-->
    <script>
        (function () {
            const storedTheme = localStorage.getItem('theme') || 'light';
            document.documentElement.setAttribute('data-bs-theme', storedTheme);
        })();
    </script>
</head>
<body>

<div class="top-bar text-white py-2" style="background-color: #222222;">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
            <small class="me-3 d-none d-sm-inline"><i class="bi bi-telephone-fill me-1"></i> +255 673 443 706</small>
            <small class="d-none d-sm-inline"><i class="bi bi-envelope-fill me-1"></i> kenseepexecutivefireworks@gmail.com</small>
            <small class="d-sm-none"><i class="bi bi-telephone-fill"></i> +255 673 443 706</small>
        </div>
        <div class="d-flex">
            <a href="#" class="text-white me-3"><i class="bi bi-instagram"></i></a>
            <a href="#" class="text-white me-3"><i class="bi bi-facebook"></i></a>
            <a href="#" class="text-white me-3"><i class="bi bi-youtube"></i></a>
            <a href="https://wa.me/255673443706?text=Hello%20I%20am%20interested%20in%20your%20services"
               class="text-white me-3" target="_blank" rel="noopener">
                <i class="bi bi-whatsapp"></i>
            </a>
        </div>
    </div>
</div>

<div class="site-wrap">
    @include('layouts.top-nav')

    <main>
        @yield('content')
    </main>

    @include('layouts.footer')
</div>

<button id="back-to-top"><i class="bi bi-arrow-up-short"></i></button>

<script src="{{ asset('assets/vendors/bootstrap/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendors/gsap/gsap.min.js') }}"></script>
<script src="{{ asset('assets/vendors/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/vendors/isotope/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/vendors/glightbox/glightbox.min.js') }}"></script>
<script src="{{ asset('assets/vendors/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendors/aos/aos.js') }}"></script>
<script src="{{ asset('assets/vendors/purecounter/purecounter.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>

@stack('scripts')

</body>
</html>

