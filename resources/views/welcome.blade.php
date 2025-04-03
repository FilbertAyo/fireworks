<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>KENSEEP EXECUTIVE FIREWORKS</title>

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

<body class="bg-white">


    @include('layouts.top-nav')


    <section class="section main-banner" id="top" data-section="section1" style="height: 70vh">
        <video autoplay muted loop id="bg-video">
            <source src="assets/images/course-video.mp4" type="video/mp4" />
        </video>
        <div class="video-overlay header-text text-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="caption">

                            <div class="icon">
                                <img class="img-fluid" src="{{ asset('assets/images/icon-deal.png') }}" alt="Icon"
                                    style="width: 80px; height: 80px;">
                            </div>

                            <h2 class="main-title">KENSEEP EXECUTIVE FIREWORKS</h2>
                            <h6 class="sub-title">Illuminating Life’s Most Memorable Moments and Every Celebration with Spectacular
                                Fireworks, Delivered Safely and Professionally.</h6>

                            <div class="row justify-content-center mt-3">
                                <div class="col-auto buy-firework">
                                    <a href="/becomesponsor.html" class="outline-btn">Buy firework</a>
                                </div>
                                <div class="col-auto">
                                    <a href="{{ url('/book') }}" class="main-btn scroll-to-section">Book event</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        @media (max-width: 768px) {
            .main-title {
                font-size: 40px !important;
            }
            .sub-title {
                display: none;
            }
            .buy-firework{
                display: none;
            }

        }
        @media (min-width: 769px) {
            .main-title {
                font-size: 50px !important;
            }
            .sub-title {
                font-size: 14px !important;
            }
        }
    </style>


    <div class="container-xxl py-5">

        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <div class="about-img position-relative overflow-hidden p-5 pe-0">
                        <img class="img-fluid w-100" src="{{ asset('assets/images/kenseep.jpg') }}">
                    </div>
                </div>
                <div class="col-lg-6">
                    <h1 class="mb-4">About us</h1>
                    <p class="mb-4">Kenseep Executive Fireworks is a leading fireworks company
                        dedicated to adding sparkle and excitement to celebrations. Specializing in both the sale of
                        high-quality fireworks and professional event execution, the company ensures unforgettable
                        moments for every occasion. Whether you're planning a wedding, corporate event, festival, or
                        private celebration, Kenseep Executive Fireworks provides expertly trained specialists to
                        handle breathtaking displays with safety and precision. Committed to quality, innovation,
                        and customer satisfaction, Kenseep Executive Fireworks transforms ordinary events into
                        extraordinary memories.</p>

                    <a class="btn btn-primary py-3 px-5 mt-3" href="{{ url('/contact') }}">Contact Us</a>
                </div>
            </div>

            <div class="col-lg-12 mt-5">

                <div class="text-center mx-auto mb-5" style="max-width: 600px;">
                    <h1 class="mb-3">Fireworks Services</h1>
                    <p>Explore our spectacular fireworks services for all occasions.</p>
                </div>

                <div class="row d-flex align-items-stretch">
                    <div class="col-lg-4">
                        <div class="meeting-item h-100">
                            <div class="thumb">
                                <div class="price">
                                    <span class="text-danger">Event Celebrations</span>
                                </div>
                                <a href="meeting-details.html"><img src="assets/images/wedding picture ideas, fireworks.jpeg" alt="Event Celebrations"></a>
                            </div>
                            <div class="down-content">
                                <a class="text-white">Make your events unforgettable with spectacular fireworks displays for weddings, New Year’s, and more.</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="meeting-item h-100">
                            <div class="thumb">
                                <div class="price">
                                    <span class="text-danger">Online Fireworks Shop</span>
                                </div>
                                <a href="meeting-details.html"><img src="assets/images/56 First Date Ideas for Every Budget.jpeg" alt="Online Fireworks Shop"></a>
                            </div>
                            <div class="down-content">
                                <a class="text-white">Buy fireworks online and have them delivered to your doorstep. Perfect for DIY celebrations. <br> <br>  </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="meeting-item h-100">
                            <div class="thumb">
                                <div class="price">
                                    <span class="text-primary">Special Occasions</span>
                                </div>
                                <a href="meeting-details.html"><img src="assets/images/Concert B&W Wallpaper.jpeg" alt="Special Occasions"></a>
                            </div>
                            <div class="down-content">
                                <a class="text-white">Enhance ceremonies like baby showers, football events, and club parties with breathtaking fireworks.</a>
                            </div>
                        </div>
                    </div>


                </div>

            </div>
        </div>
    </div>


    <div class="container-xxl">
        <div class="container">
            <div class="row g-0 gx-5 align-items-end">
                <div class="col-lg-6">
                    <div class="text-start mx-auto mb-5">
                        <h1 class="mb-3">Fireworks Products</h1>
                        <p>Browse our selection of fireworks products, choose your favorites, and either purchase them
                            now or use them to book an event.</p>
                    </div>
                </div>
                <div class="col-lg-6 text-start text-lg-end">
                    <ul class="nav nav-pills d-inline-flex justify-content-end mb-5">
                        <li class="nav-item me-2">
                            <a class="btn btn-outline-primary active" data-bs-toggle="pill"
                                href="#tab-1">Featured</a>
                        </li>
                        <li class="nav-item me-2">
                            <a class="btn btn-outline-primary" data-bs-toggle="pill" href="#tab-2">For Sell</a>
                        </li>

                    </ul>
                </div>
            </div>

                    <div class="row g-4">
                        @foreach ($products as $product)
                         <div class="col-6 col-md-4 col-lg-3 mb-3">
                                <div class="property-item rounded overflow-hidden">
                                    <div class="position-relative overflow-hidden">
                                        <a href="{{ route('product.showProduct',$product->id) }}">
                                            <img class="img-fluid" src="{{ asset($product->image_url) }}"
                                                alt="">
                                        </a>
                                        <a href="{{ $product->video_url }}" target="_blank"
                                            class="bg-primary text-white position-absolute start-0 top-0 m-2 px-2"> video</a>

                                    </div>
                                    <div class="p-4 pb-0">
                                        <h6 class="text-primary mb-1">TZS {{ number_format($product->price) }}</h6>
                                        <a class="d-block h6 mb-2" href="">{{ $product->product_name }}</a>
                                        {{-- <p><i
                                                class="fa fa-fire text-primary me-2"></i>{{ $product->product_description }}
                                        </p> --}}
                                    </div>
                                    <div class="d-flex border-top">
                                        <small class="flex-fill text-center border-end py-2"><i
                                                class="fa fa-clock text-primary me-2"></i>{{ $product->duration }}'s</small>
                                        <small class="flex-fill text-center py-2"><i
                                                class="fa fa-list text-primary me-2"></i>{{ $product->category }}</small>
                                    </div>
                                </div>
                            </div>

                        @endforeach

                        <div class="col-12 text-center">
                            <a class="btn btn-primary" href="{{ url('/product_list') }}">Browse More
                                Products</a>
                        </div>
                    </div>

        </div>
    </div>


    <div class="container-xxl mt-5">
        <div class="container">
            <div class="rounded p-3" style="background:  rgba(185, 0, 0, 0.3);">
                <div class="bg-white rounded p-4">
                    <div class="row g-5 align-items-center">
                        <div class="col-lg-6">
                            <img class="img-fluid rounded w-100" src="assets/images/contactus.jpeg" alt="">
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-4">
                                <h1 class="mb-3">Contact Us</h1>
                                <p>Eirmod sed ipsum dolor sit rebum magna erat. Tempor lorem kasd vero ipsum sit sit
                                    diam justo sed vero dolor duo.</p>
                            </div>
                            <a href="{{ url('/contact') }}" class="btn btn-primary me-2 mt-3"><i
                                    class="fa fa-phone-alt me-2"></i>Make A Call</a>
                            <a href="{{ url('/book') }}" class="btn btn-dark  mt-3"><i
                                    class="fa fa-calendar-alt me-2"></i>Book</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-xxl py-5">

        <div class="text-center mx-auto mb-5 wow fadeInUp" style="max-width: 600px;">
            <h1 class="mb-3">Our Team</h1>
            <p>Meet our team</p>
        </div>
        <div class="row g-4 wow fadeInUp">

            @foreach ($users as $user)
            <div class="col-lg-3 col-md-6" >
                <div class="team-item rounded overflow-hidden">
                    <div class="position-relative">
                        <img class="img-fluid" src="img/team-4.jpg" alt="">
                        <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                            <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="text-center p-4 mt-3">
                        <h5 class="fw-bold mb-0">{{ $user->name }}</h5>
                        <small>Designation</small>
                    </div>
                </div>
            </div>
            @endforeach

        </div>

</div>



    @include('elements.footer')

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



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


</body>

</html>
