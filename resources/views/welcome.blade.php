@extends('layouts.front-app')

@section('content')

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
                                    @auth
                                    <a href="{{ url('/book') }}" class="main-btn scroll-to-section">Book event</a>
                                @else
                                    <a href="{{ url('/login') }}" class="main-btn scroll-to-section">Book event</a>
                                @endauth

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="container-xxl py-5">

        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                        <img class="img-fluid w-100" src="{{ asset('assets/images/kenseep.jpg') }}">
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

                <div class="text-center mx-auto mb-4" >
                    <h1 class="mb-1">Fireworks Services</h1>
                    <p>Explore our spectacular fireworks services for all occasions.</p>
                </div>

                <div class="row d-flex align-items-stretch">
                    <div class="col-12 col-md-4">
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

                    <div class="col-12 col-md-4">
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

                    <div class="col-12 col-md-4">
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
                    <div class="text-start mx-auto mb-4">
                        <h1 class="mb-1">Fireworks Products</h1>
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
                                        <a href="{{ route('product.showProduct', $product->id) }}">
                                            <img class="img-fluid product-image" src="{{ asset($product->image_url) }}"
                                                alt="" style="  height: 200px; object-fit: cover; width: 100%;">
                                        </a>
                                        <a href="{{ $product->video_url }}" target="_blank"
                                            class="bg-primary text-white position-absolute start-0 top-0 m-2 px-2">
                                            <i class="bi bi-play-circle"></i>
                                        </a>
                                    </div>
                                    <div class="py-4 px-2 pb-0 mb-2">
                                        <h6 class="text-primary mb-1">TZS {{ number_format($product->price) }}</h6>
                                        <h6 class="d-block h6" href="">{{ $product->product_name }}</h6>
                                        <small class="flex-fill"><i
                                            class="fa fa-layer-group text-primary me-2"></i>{{ $product->category }}</small>
                                    </div>
                                    <div class="d-flex border-top">
                                        <small class="flex-fill text-center border-end py-2"><i
                                                class="fa fa-clock text-primary me-1"></i>{{ $product->duration }}'s</small>
                                        <small class="flex-fill text-center border-end py-2"><i
                                                class="fa fa-box text-primary me-1"></i>{{ $product->piece }}p</small>

                                        <small class="flex-fill text-center">
                                            <form method="POST" action="{{ route('cart.add') }}">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <button type="submit" class="btn text-dark"><i class="fa fa-cart-plus"></i>
                                                </button>
                                            </form>
                                        </small>
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


    <!-- Video Modal -->
<div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="videoModalLabel">YouTube Video</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <iframe id="youtubeVideo" width="100%" height="315" src="" frameborder="0" allowfullscreen></iframe>
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
                            <a href="tel:+255673443706" class="btn btn-primary me-2 mt-3">
                                <i class="fa fa-phone-alt me-2"></i>Make A Call
                            </a>

                            <a href="{{ url('/book') }}" class="btn btn-dark  mt-3"><i
                                    class="fa fa-calendar-alt me-2"></i>Book</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-xxl py-5">
        <div class="text-center mx-auto">
            <h1 class="mb-3">People & Companies We've Worked With</h1>
            <p>We are proud to have provided fireworks services for the following companies and individuals</p>
        </div>

        <div id="workedWithCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <!-- Slide 1 -->
                <div class="carousel-item active">
                    <div class="row justify-content-center">
                        <div class="col-md-2 text-center">
                            <img src="assets/images/wasafi.png" alt="Company 1" class="d-block mx-auto" >
                            <p>Company 1</p>
                        </div>
                        <div class="col-md-2 text-center">
                            <img src="assets/images/wasafi.png" alt="Company 2" class="d-block mx-auto " >
                            <p>Company 2</p>
                        </div>
                        <div class="col-md-2 text-center">
                            <img src="assets/images/wasafi.png" alt="Company 3" class="d-block mx-auto">
                            <p>Company 3</p>
                        </div>
                        <div class="col-md-2 text-center">
                            <img src="assets/images/wasafi.png" alt="Company 1" class="d-block mx-auto">
                            <p>Company 1</p>
                        </div>
                        <div class="col-md-2 text-center">
                            <img src="assets/images/wasafi.png" alt="Company 2" class="d-block mx-auto " >
                            <p>Company 2</p>
                        </div>
                        <div class="col-md-2 text-center">
                            <img src="assets/images/wasafi.png" alt="Company 3" class="d-block mx-auto">
                            <p>Company 3</p>
                        </div>
                    </div>
                </div>

            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#workedWithCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#workedWithCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>




@endsection
