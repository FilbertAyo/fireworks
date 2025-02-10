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

    <div class="container-fluid nav-bar">
        <nav class="navbar navbar-expand-lg bg-white navbar-light px-4">
            <!-- Sidebar Toggle Button for Medium and Small Screens -->
            <button class="navbar-toggler d-lg-none order-1" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#sidebarMenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Logo remains as before -->
            <a href="#" class="navbar-brand d-flex align-items-center text-center">
                <div class="icon p-2 me-2">
                    <img class="img-fluid" src="{{ asset('assets/images/icon-deal.png') }}" alt="Icon"
                        style="width: 30px; height: 30px;">
                </div>
            </a>

            <!-- Profile at the Right -->

            <div class="collapse navbar-collapse d-lg-flex d-none" id="navbarCollapse">
                <div class="navbar-nav ms-auto">
                    <a href="{{ url('/') }}" class="nav-item nav-link active">Home</a>
                    <a href="{{ url('/about') }}" class="nav-item nav-link">About</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Operation</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="{{ url('/product_list') }}" class="dropdown-item">Product List</a>
                        </div>
                    </div>
                    <a href="{{ url('/contact') }}" class="nav-item nav-link">Contact</a>
                </div>
            </div>
            <div class="d-flex align-items-center ms-auto">
                @auth
                    <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <img src="{{ asset('assets/images/profile.jpeg') }}" alt="" width="35" height="35"
                            class="rounded-circle">
                    </a>
                    <div class="dropdown-menu dropdown-menu-end bg-dark text-center p-3 rounded shadow-lg border-0"
                        aria-labelledby="drop2">
                        <div class="d-flex flex-column align-items-center">
                            <div class="text-white fw-bold">{{ Auth::user()->name }}</div>
                            <a href="{{ route('my-dashboard') }}"
                                class="text-white text-decoration-none mt-2 px-3 py-1 rounded"
                                style="background: rgba(255, 255, 255, 0.2); transition: 0.3s;">Dashboard</a>
                            <form method="POST" action="{{ route('logout') }}" class="w-100 mt-3">
                                @csrf
                                <button type="submit"
                                    class="btn btn-danger btn-sm w-100 fw-bold rounded-pill">Logout</button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary px-3 d-none d-lg-flex">Login</a>
                @endauth
            </div>
        </nav>

        <div class="offcanvas offcanvas-start d-lg-none" tabindex="-1" id="sidebarMenu">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title">Menu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
            </div>
            <div class="offcanvas-body">
                <div class="navbar-nav">
                    <a href="{{ url('/') }}" class="nav-item nav-link active">Home</a>
                    <a href="{{ url('/about') }}" class="nav-item nav-link">About</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Operation</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="{{ url('/product_list') }}" class="dropdown-item">Product List</a>
                        </div>
                    </div>
                    <a href="{{ url('/contact') }}" class="nav-item nav-link">Contact</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container-xxl py-3">
        <div class="container">
            <div class="tab-content mt-3" id="myTabsContent">
                <!-- My Bookings Tab -->
                <div class="tab-pane fade show active" id="bookings" role="tabpanel">
                    <div class="container">
                        <div class="row">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title fw-semibold">My Booking</h5>
                            </div>

                            <div class="col-lg-12 d-flex align-items-stretch">
                                <!-- Booking Details Card -->
                                <div class="card mt-3 w-100 bg-light">
                                    <div class="card-body">
                                        <h5 class="card-title fw-semibold">Booking Details</h5>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p><strong>Task Name:</strong> {{ $task->task_name }}</p>
                                                <p><strong>Event Date:</strong> {{ $task->event_date }}</p>
                                                <p><strong>Event Time:</strong> {{ $task->event_time }}</p>
                                                <p><strong>Event Address:</strong> {{ $task->event_address }}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <p><strong>Contact Phone:</strong> {{ $task->event_phone }}</p>
                                                <p><strong>Contact Email:</strong> {{ $task->event_email }}</p>
                                                <p><strong>Description:</strong> {{ $task->task_description }}</p>
                                                <p><strong>Status:</strong>
                                                    @if ($assignedUsers != null)
                                                        <span class="badge bg-secondary">Assigned</span>
                                                    @else
                                                        <span class="badge bg-danger">Not Assigned</span>
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Selected Products Section -->
                            <div class="col-lg-12 mt-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title fw-semibold mb-3">Selected Fireworks</h5>
                                        <div class="row">
                                            @forelse ($products as $product)
                                                <div class="col-md-3 mb-3">
                                                    <div class="card">
                                                        <img src="{{ asset($product->image_url) }}" class="card-img-top" alt="Product Image">
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
                                        <div class="col-md-3 mb-3">
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
                                        <p>No Experts assigned for this task.</p>
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
            swal("Good job!", "{{ session('success') }}", "success");
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
