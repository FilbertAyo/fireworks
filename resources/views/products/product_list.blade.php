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
                            <h2 style="font-size: 40px;">Fireworks List</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="container-fluid bg-primary" style="padding: 20px;">
        <div class="container">
            <form action="{{ url('/product_list') }}" method="GET">
            <div class="row g-2">
                <div class="col-md-10">
                    <div class="row g-2">
                        <div class="col-md-12">
                            <input type="text" class="form-control border-0 py-2" name="search" value="{{ request()->input('search') }}" placeholder="Search Fireworks or category">
                        </div>

                    </div>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-dark border-0 w-100 py-2">Search</button>
                </div>
            </div>
        </form>
        </div>
    </div>

    <div class="container-xxl py-5">
            <div class="row g-4">

                <form method="GET" action="{{ route('book') }}">
                    @csrf
                    <div class="row">
                        @forelse ($products as $product)
                        <div class="col-6 col-md-4 col-lg-3 mb-3">
                                <div class="property-item rounded overflow-hidden">
                                    <div class="position-relative overflow-hidden">
                                        <a href="{{ route('product.showProduct',$product->id) }}">
                                            <img class="img-fluid" src="{{ asset($product->image_url) }}"
                                                alt="">
                                        </a>
                                        <a href="{{ $product->video_url }}" target="_blank"
                                            class="bg-primary text-white position-absolute start-0 top-0 m-2 px-2"><i class="bi bi-play-circle"></i></a>
                                    </div>
                                    <div class="py-4 px-2 pb-0 mb-2">
                                        <h6 class="text-primary mb-1">TZS {{ number_format($product->price) }}</h6>
                                        <h6 class="d-block h6" href="">{{ $product->product_name }}</h6>
                                        <small class="flex-fill"><i
                                            class="fa fa-layer-group text-primary me-2"></i>{{ $product->category }}</small>
                                    </div>
                                    <div class="d-flex border-top">
                                        <small class="flex-fill text-center border-end py-2"><i
                                                class="fa fa-clock text-primary me-2"></i>{{ $product->duration }}'s</small>
                                                <small class="flex-fill text-center border-end py-2"><i
                                                    class="fa fa-box text-primary me-2"></i>{{ $product->quantity }} pieces</small>

                                        <small class="flex-fill text-center py-2">
                                            <input type="checkbox"
                                                class="form-check-input" id="product{{ $product->id }}"
                                                name="products[]" value="{{ $product->id }}">
                                            <label class="form-check-label"
                                                for="product{{ $product->id }}">select</label></small>
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
                            <div class="d-flex justify-content-between mt-3">
                                <div class="align-self-center">
                                    <p>Showing {{ $products->firstItem() }} to {{ $products->lastItem() }} of {{ $products->total() }} products</p>
                                </div>
                                <div class="align-self-center">
                                    {{ $products->links('vendor.pagination.bootstrap-4') }} <!-- Bootstrap pagination links -->
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary mt-4">Proceed to Book</button>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-primary mt-4">Proceed to Book</a>

                        @endauth
                    </div>

                </form>
            </div>
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
