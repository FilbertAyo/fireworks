<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Focus - Bootstrap Admin Dashboard </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('toastr/css/toastr.min.css') }}">
    <!-- Custom Stylesheet -->
    <link href="./css/style.css" rel="stylesheet">

</head>

<body>


    <div id="main-wrapper">


        <div class="content-body">
            <div class="container-fluid">


                <!-- Toastr -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Toastr</h4>
                            </div>
                            <div class="card-body">
                                <button type="button" class="btn btn-dark mb-2 " id="toastr-success-top-right">Top
                                    Right</button>
                                <button type="button" class="btn btn-dark mb-2  mr-2" id="toastr-success-bottom-right">Bottom Right</button>
                                <button type="button" class="btn btn-dark mb-2  mr-2" id="toastr-success-bottom-left">Bottom Left</button>
                                <button type="button" class="btn btn-dark mb-2  mr-2" id="toastr-success-top-left">Top
                                    Left</button>
                                <button type="button" class="btn btn-dark mb-2  mr-2" id="toastr-success-top-full-width">Top Full Width</button>
                                <button type="button" class="btn btn-dark mb-2  mr-2" id="toastr-success-bottom-full-width">Bottom Full Width</button>
                                <button type="button" class="btn btn-dark mb-2  mr-2" id="toastr-success-top-center">Top
                                    Center</button>
                                <button type="button" class="btn btn-dark mb-2  mr-2" id="toastr-success-bottom-center">Bottom Center</button>
                                <button type="button" class="btn btn-info mb-2  mr-2" id="toastr-info-top-right">Info</button>
                                <button type="button" class="btn btn-warning mb-2  mr-2" id="toastr-warning-top-right">Warning</button>
                                <button type="button" class="btn btn-danger mb-2  mr-2" id="toastr-danger-top-right">Error</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>

    <script src="{{ asset('toastr/global.min.js') }}"></script>
    <script src="{{ asset('toastr/quixnav-init.js') }}"></script>
    <script src="{{ asset('toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('toastr/toastr-init.js') }}"></script>

</body>

</html>
