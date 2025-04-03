<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Kenseep executive fireworks</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">


    <link href="{{ asset('assets/images/icon-deal.png') }}" rel="icon">

    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/templatemo-edu-meeting.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/lightbox.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body class="bg-white p-0">
    @include('layouts.top-nav')

    <section class="section main-banner " id="top" data-section="section1" style="height: 20vh; background-image: url('{{ asset('assets/images/kenseep.jpg') }}');">

        <div class="video-overlay header-text text-center">
            <div class="container">
                <div class="row">
                        <div class="caption">
                            <h2 style="font-size: 35px;">Fireworks Details</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container-fluid bg-primary" style="padding: 20px;">

    </div>

    <div class="container-xxl mt-3 p-3">
        <div class="row justify-content-center">
            <div class="card border-0 rounded" style="background-color: #F6F6F6;">
                <div class="row g-0 align-items-center">
                    <!-- Product Image -->
                    <div class="col-md-5 py-3">
                        <img class="img-fluid rounded-start" src="{{ asset($product->image_url) }}" alt="Product Image">
                    </div>
                    <!-- Product Details -->
                    <div class="col-md-7">
                        <div class="card-body">
                            <h3 class="card-title text-primary"> {{ $product->product_name }}</h3>
                            <h5 class="text-success"><i class="fas fa-tag"></i> <strong>Price:</strong> <span class="text-success">TZS {{ number_format($product->price  )}}</span></h5>
                            <p><i class="fas fa-layer-group"></i> <strong>Category:</strong> {{ $product->category }}</p>
                            <p><i class="fas fa-video"></i> <strong>Video Preview:</strong>
                                <a href="{{ $product->video_url }}" target="_blank" class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-play-circle"></i> Watch Video
                                </a>
                            </p>
                            <p><i class="fas fa-align-left"></i> <strong>Description:</strong></p>
                            <p>{{ $product->product_description }}</p>
                            <p><i class="fas fa-clock"></i> <strong>Duration:</strong> {{ $product->duration }}'s</p>
                            <div class="d-flex justify-content-start mt-4" style="gap: 5px;">
                                <button type="button" class="btn btn-danger">Buy Now</button>
                                <button type="button" class="btn btn-success "><i class="fas fa-shopping-cart"></i> Add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Font Awesome for Icons -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>

    </div>


    @include('elements.footer')


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/isotope.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('assets/js/lightbox.js') }}"></script>
    <script src="{{ asset('assets/js/tabs.js') }}"></script>
    <script src="{{ asset('assets/js/video.js') }}"></script>
    <script src="{{ asset('assets/js/slick-slider.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>

</body>

</html>
