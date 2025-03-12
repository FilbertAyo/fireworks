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

    <div class="container-xxl py-5">
        <div class="container">
            <div class="tab-content mt-3" id="myTabsContent">
                <!-- My Bookings Tab -->
                <div class="tab-pane fade show active" id="bookings" role="tabpanel">
                    <div class="container">
                        <div class="row">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title fw-semibold">My Booking</h5>
                                <a href="{{ route('my-dashboard') }}" class="btn bg-secondary text-white">Go Back</a>
                            </div>

                            <div class="col-lg-12 d-flex align-items-stretch">
                                <div class="card mt-3 w-100 shadow-sm border-0 rounded-3">
                                    <div class="card-header bg-warning border-bottom">
                                        <h5 class="fw-bold text-dark mb-0"><i class="fas fa-calendar-check me-2"></i>Booking Details</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row g-4">
                                            <div class="col-md-6">
                                                <p><strong><i class="fas fa-tasks me-2"></i>Task Name:</strong> {{ $task->task_name }}</p>
                                                <p><strong><i class="far fa-calendar-alt me-2"></i>Event Date:</strong> {{ $task->event_date }}</p>
                                                <p><strong><i class="far fa-clock me-2"></i>Event Time:</strong> {{ $task->event_time }}</p>
                                                <p class="{{ $task->payment_status == 'Paid' ? 'text-success' : 'text-danger' }}">
                                                    <strong><i class="fas fa-credit-card me-2"></i>Payment Status:</strong> {{ ucfirst($task->payment_status) }}
                                                </p>
                                            </div>
                                            <div class="col-md-6">
                                                <p><strong><i class="fas fa-phone-alt me-2"></i>Contact Phone:</strong> {{ $task->event_phone }}</p>
                                                <p><strong><i class="fas fa-envelope me-2"></i>Contact Email:</strong> {{ $task->event_email }}</p>
                                                <p><strong><i class="fas fa-map-marker-alt me-2"></i>Event Location:</strong> {{ $task->event_address }}</p>
                                                <p><strong><i class="fas fa-user-check me-2"></i>Status:</strong>
                                                    @if ($assignedUsers->isEmpty())
                                                        <span class="badge bg-danger">Not Assigned</span>
                                                    @else
                                                        <span class="badge bg-success">Assigned</span>
                                                    @endif
                                                </p>
                                            </div>
                                            <div class="col-12">
                                                <p><strong><i class="fas fa-file-alt me-2"></i>Task Description:</strong> {{ $task->task_description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Add FontAwesome for icons -->
                                <script src="https://kit.fontawesome.com/YOUR_KIT_CODE.js" crossorigin="anonymous"></script>



                            </div>


                            <div class="col-lg-12 mt-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title fw-semibold mb-3">Selected Fireworks</h5>
                                        <div class="row">
                                            @forelse ($products as $product)
                                                <div class="col-md-4 mb-3">
                                                    <div class="card">
                                                        <img src="{{ asset($product->product_image) }}" class="card-img-top" alt="Product Image">
                                                        <div class="card-body">
                                                            <h6>{{ $product->product_name }}</h6>
                                                            <p><strong>Price:</strong> TZS {{ $product->product_price }}/=</p>
                                                            <p><strong>Quantity:</strong> {{ $product->product_quantity }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @empty
                                                <p>No products selected for this task.</p>
                                            @endforelse
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Assigned Users Section -->
                            <div class="col-lg-12 mt-4">
                                <h5 class="card-title fw-semibold mb-3">Expert attendee</h5>
                                <div class="row">
                                    @forelse ($assignedUsers as $user)
                                        <div class="col-md-4 mb-3">
                                            <div class="card text-center p-3">
                                                <!-- Rounded Profile Image -->
                                                <img src="{{ asset('assets/images/profile.jpeg') }}" alt="Profile Image"
                                                    class="rounded-circle mx-auto"
                                                    style="width: 100px; height: 100px; object-fit: cover;">
                                                <!-- User Details -->
                                                <div class="card-body">
                                                    <h5 class="card-title mb-1">{{ $user->name }}</h5>
                                                    <p class="card-text mb-1">{{ $user->phone }}</p>
                                                    <p class="card-text">{{ $user->email }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <p>No Experts assigned for your task yet.</p>
                                    @endforelse
                                </div>
                            </div>

                        </div>
                    </div> <!-- End Container -->
                </div>
            </div>
        </div>
    </div>


    @include('elements.footer')

    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
     <link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">

    <script>
        @if (session('success'))
            swal("Success!", "{{ session('success') }}", "success");
        @elseif (session('error'))
            swal("Oops!", "{{ session('error') }}", "error");
        @endif
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
