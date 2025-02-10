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

    <section class="section main-banner " id="top" data-section="section1" style="height: 40vh">
        <video autoplay muted loop id="bg-video">
            <source src="assets/images/course-video.mp4" type="video/mp4" />
        </video>
        <div class="video-overlay header-text text-center">

            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="caption mt-5">
                            <h2 style="font-size: 60px;">Fireworks List</h2>
                            <h6>Illuminating Life’s Most Memorable Moments and Every Celebration with Spectacular
                                Fireworks, Delivered Safely and Professionally.</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 20px;">

    </div>

    <!-- Contact Start -->
    <div class="container-xxl py-5">
        <div class="container">

            <div class="row g-4">

                <form method="GET" action="{{ route('book') }}">
                    @csrf
                    <div class="row col-12">
                        @forelse ($products as $product)
                            <div class="col-lg-4 col-md-6">
                                <div class="property-item rounded overflow-hidden">
                                    <div class="position-relative overflow-hidden">
                                        <a href="javascript:void(0);" data-bs-toggle="modal"
                                            data-bs-target="#productModal{{ $product->id }}">
                                            <img class="img-fluid" src="{{ asset( $product->image_url) }}" alt="">
                                        </a>
                                        <a href="{{ $product->video_url }}" target="_blank"
                                            class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">Sample
                                            video</a>
                                        <div
                                            class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">
                                            Buy</div>
                                    </div>
                                    <div class="p-4 pb-0">
                                        <h5 class="text-primary mb-3">TZS {{ $product->price }}</h5>
                                        <a class="d-block h5 mb-2" href="">{{ $product->product_name }}</a>
                                        <p><i
                                                class="fa fa-fire text-primary me-2"></i>{{ $product->product_description }}
                                        </p>
                                    </div>
                                    <div class="d-flex border-top">
                                        <small class="flex-fill text-center border-end py-2"><i
                                                class="fa fa-clock text-primary me-2"></i>{{ $product->duration }}'s</small>
                                        <small class="flex-fill text-center border-end py-2"><i
                                                class="fa fa-bed text-primary me-2"></i>{{ $product->category }}</small>
                                        <small class="flex-fill text-center py-2"> <input type="checkbox"
                                                class="form-check-input" id="product{{ $product->id }}"
                                                name="products[]" value="{{ $product->id }}">
                                            <label class="form-check-label"
                                                for="product{{ $product->id }}">Select</label></small>
                                    </div>
                                </div>
                            </div>


                            <div class="modal fade" id="productModal{{ $product->id }}" tabindex="-1"
                                aria-labelledby="productModalLabel{{ $product->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="productModalLabel{{ $product->id }}">
                                                {{ $product->product_name }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <img class="img-fluid mb-3" src="{{ asset( $product->image_url) }}" alt="Product Image">
                                            <p><strong>Price:</strong> TZS {{ $product->price }}</p>
                                            <p><strong>Category:</strong> {{ $product->category }}</p>
                                            <p><strong>Description:</strong> {{ $product->product_description }}</p>
                                            <p><strong>Duration:</strong> {{ $product->duration }}'s</p>
                                            <p><strong>Product Status:</strong> {{ $product->product_status }}</p>
                                            <p><strong>Video URL:</strong> <a href="{{ $product->video_url }}"
                                                    target="_blank">View Video</a></p>
                                        </div>
                                        <div class="modal-footer d-flex justify-content-between">
                                            <button type="button" class="btn btn-success">Buy</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="text-center">

                                    <h6 class="fw-semibold mb-0 text-danger">No Fireworks found.</h6>

                            </div>
                        @endforelse
                    </div>
                    <div class="text-center">
                        @auth
                            <button type="submit" class="btn btn-primary mt-4">Proceed to Book</button>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-primary mt-4">Proceed to Book</a>
                        @endauth
                    </div>


                </form>


            </div>
        </div>
    </div>


    @include('elements.footer')


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    <!-- Scripts -->
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/isotope.min.js"></script>
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/lightbox.js"></script>
    <script src="assets/js/tabs.js"></script>
    <script src="assets/js/video.js"></script>
    <script src="assets/js/slick-slider.js"></script>
    <script src="assets/js/custom.js"></script>



</body>

</html>
