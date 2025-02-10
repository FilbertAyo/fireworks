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
                            <h2 style="font-size: 60px;">Book Event</h2>
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

    <div class="container card p-5">

        <form method="POST" action="{{ route('task.store') }}" enctype="multipart/form-data">
            @csrf

            <h3>Selected Products</h3>
            @if ($selectedProducts->isEmpty())
                <div class="bg-primary text-center p-4">
                    <p class="text-white">No products selected. </p>
                    <a href="{{ url('/product_list') }}" class="btn btn-warning">Go to Fireworks</a>
                </div>
            @else
                <div class="row mt-3">
                    @foreach ($selectedProducts as $product)
                        <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                            <div class="property-item rounded shadow-sm overflow-hidden border">
                                <div class="position-relative overflow-hidden">
                                    <a href="javascript:void(0);" data-bs-toggle="modal"
                                        data-bs-target="#productModal{{ $product->id }}">
                                        <img class="img-fluid" src="img/property-1.jpg" alt="Product Image">
                                    </a>
                                </div>
                                <div class="p-3 pb-0">
                                    <h5 class="text-primary mb-1" id="price{{ $product->id }}"
                                        data-base-price="{{ $product->price }}">
                                        TZS {{ $product->price }}/=
                                    </h5>
                                    <a class="d-block h5 mb-2 text-decoration-none text-dark"
                                        href="">{{ $product->product_name }}</a>
                                    <div class="d-flex align-items-center mb-3">
                                        <button type="button" class="btn btn-outline-primary btn-sm me-2"
                                            onclick="updateQuantity('minus', {{ $product->id }})">-</button>
                                        <input type="number" class="form-control text-center w-25"
                                            id="quantityInput{{ $product->id }}"
                                            name="product_quantity[]" value="1" min="1"
                                            readonly>
                                        <button type="button" class="btn btn-outline-primary btn-sm ms-2"
                                            onclick="updateQuantity('plus', {{ $product->id }})">+</button>
                                    </div>
                                </div>

                                <!-- this are needed to be uploaded to the database -->
                                <input type="hidden" name="product_id[]" value="{{ $product->id }}" >
                                <input type="hidden" name="product_name[]" value="{{ $product->product_name }}">
                                <input type="hidden" name="product_price[]" value="{{ $product->price }}" id="hiddenPrice{{ $product->id }}">

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
                                        <img class="img-fluid mb-3" src="img/property-1.jpg" alt="Product Image">
                                        <div class="row">
                                            <div class="col-6">
                                                <p><strong>Price:</strong> TZS {{ $product->price }}</p>
                                                <p><strong>Category:</strong> {{ $product->category }}</p>
                                                <p><strong>Duration:</strong> {{ $product->duration }}'s</p>
                                            </div>
                                            <div class="col-6">
                                                <p><strong>Product Status:</strong> {{ $product->product_status }}</p>
                                                <p><strong>Video URL:</strong> <a href="{{ $product->video_url }}"
                                                        target="_blank">View Video</a></p>
                                            </div>
                                        </div>
                                        <p><strong>Description:</strong> {{ $product->product_description }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            @if ($selectedProducts->isNotEmpty())
                <h3 class="mt-3">Event Details</h3>

                <div class="mb-3">
                    <label for="task_name" class="form-label">Task Name</label>
                    <input type="text" class="form-control" id="task_name" name="task_name" required>
                </div>
                <div class="row">
                    <div class="mb-3 col-6">
                        <label for="event_date" class="form-label">Event Date</label>
                        <input type="date" class="form-control" id="event_date" name="event_date" required>
                    </div>
                    <div class="mb-3 col-6">
                        <label for="event_time" class="form-label">Event Time</label>
                        <input type="time" class="form-control" id="event_time" name="event_time" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="event_address" class="form-label">Event Address</label>
                    <input type="text" class="form-control" id="event_address" name="event_address" required>
                </div>
                <div class="mb-3">
                    <label for="contact_phone" class="form-label">Contact Phone</label>
                    <input type="tel" class="form-control" id="contact_phone" name="event_phone" value="{{ Auth::user()->phone }}" required>
                </div>
                <div class="mb-3">
                    <label for="contact_person" class="form-label">Email</label>
                    <input type="email" class="form-control" id="contact_person" name="event_email" value="{{ Auth::user()->email }}" required>
                </div>
                <div class="mb-3">
                    <label for="task_description" class="form-label">Task Description</label>
                    <textarea class="form-control" id="task_description" name="task_description" rows="3"></textarea>
                </div>
                <input type="hidden" name="task_status" value="Pending">
                <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                <button type="submit" class="btn btn-primary">Confirm Booking</button>
            @endif
        </form>
    </div>

    @include('elements.footer')

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

    <script>
        function updateQuantity(action, productId) {
            const quantityInput = document.getElementById(`quantityInput${productId}`);
            const priceElement = document.querySelector(`#price${productId}`);
            const hiddenPriceInput = document.querySelector(`#hiddenPrice${productId}`);
            const basePrice = parseFloat(priceElement.dataset.basePrice); // Base price from data attribute
            let quantity = parseInt(quantityInput.value);

            if (action === 'plus') {
                quantity += 1;
            } else if (action === 'minus' && quantity > 1) {
                quantity -= 1;
            }

            quantityInput.value = quantity;

            // Calculate new price
            const newPrice = basePrice * quantity;

            // Update the price dynamically
            priceElement.textContent = `TZS ${newPrice.toLocaleString()}/=`;
            hiddenPriceInput.value = newPrice; // Update the hidden price input
        }
    </script>



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
