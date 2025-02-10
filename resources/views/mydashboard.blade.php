<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Kenseep executive fireworks</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">


    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-edu-meeting.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/lightbox.css">
    <link rel="stylesheet" href="assets/css/custom.css">

    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
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
            <ul class="nav nav-tabs" id="myTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="bookings-tab" data-bs-toggle="tab" data-bs-target="#bookings" type="button" role="tab">
                        My Bookings
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="products-tab" data-bs-toggle="tab" data-bs-target="#products" type="button" role="tab">
                        Products
                    </button>
                </li>
            </ul>

            <div class="tab-content mt-3" id="myTabsContent">
                <!-- My Bookings Tab -->
                <div class="tab-pane fade show active" id="bookings" role="tabpanel">
                    <div class="container">
                        @if($tasks->isEmpty())
                        <div class="bg-primary text-center p-4 mt-5">
                            <p class="text-white">No Booking available yet. </p>
                            <a href="{{ url('/product_list') }}" class="btn btn-warning">Go to Fireworks</a>
                        </div>
                    @else

                    <div class="row">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="card-title fw-semibold ">My Bookings</h5>
                        </div>

                        <div class="col-lg-12 d-flex align-items-stretch">

                                        <table class="table text-nowrap align-middle table-bordered">
                                            <thead class="text-dark fs-4">
                                                <tr>
                                                    <th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Id</h6>
                                                    </th>
                                                    <th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Task Name</h6>
                                                    </th>
                                                    <th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Date & Time</h6>
                                                    </th>
                                                    <th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Contacts</h6>
                                                    </th>
                                                    <th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Where</h6>
                                                    </th>

                                                    <th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Status</h6>
                                                    </th>
                                                    <th class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">Actions</h6>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($tasks as $index => $task)
                                                    <tr>
                                                        <td class="border-bottom-0">
                                                            <h6 class="fw-semibold mb-0">{{ $index + 1 }}</h6>
                                                        </td>
                                                        <td class="border-bottom-0">
                                                            <h6 class="fw-semibold mb-1">{{ $task->task_name }}</h6>
                                                        </td>
                                                        <td class="border-bottom-0">
                                                            <h6 class="fw-semibold mb-1">{{ $task->event_date }}</h6>
                                                            <span class="fw-normal">{{ $task->event_time }}</span>
                                                        </td>
                                                        <td class="border-bottom-0">
                                                            <h6 class="fw-semibold mb-1">{{ $task->event_phone }}</h6>
                                                            <span class="fw-normal">{{ $task->event_email }}</span>
                                                        </td>
                                                        <td class="border-bottom-0">
                                                            <h6 class="fw-semibold mb-1">{{ $task->event_address }}</h6>
                                                        </td>

                                                        <td class="border-bottom-0">
                                                            <div class="d-flex align-items-center gap-2">
                                                                <span
                                                                    class="badge bg-primary rounded-3 fw-semibold">{{ $task->task_status }}</span>
                                                            </div>
                                                        </td>
                                                        <td class="border-bottom-0">
                                                            <a href="{{ route('task.showTask', $task->id) }}" class="badge bg-warning">View</a>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                    </div>
                    @endif
                    </div>


                </div>

                <!-- Products Tab -->
                <div class="tab-pane fade" id="products" role="tabpanel">
                    <h6>Products</h6>
                    <p>List of products will go here.</p>
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
