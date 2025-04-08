
<!-- resources/views/errors/layout.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>@yield('code') | @yield('title')</title>
    <link href="{{ asset('assets/images/icon-deal.png') }}" rel="icon">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('backend/assets/css/styles.min.css') }}" />
</head>
<body>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="alert alert-danger text-center px-5" role="alert">
            <h1 class="alert-heading">@yield('code') | @yield('title')</h1>
            <p>@yield('message')</p>
        </div>
    </div>
</body>
</html>
