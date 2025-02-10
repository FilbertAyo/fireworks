<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Kenseep executive fireworks</title>

    <link rel="shortcut icon" type="image/png" href="backend/assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="backend/assets/css/styles.min.css" />

</head>

<body>


            {{ $slot }}


    <script src="backend/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="backend/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
