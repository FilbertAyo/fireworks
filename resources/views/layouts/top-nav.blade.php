<header>

    <div class="top-bar text-white py-2" style="background-color: #222222;">
        <div class="container d-flex justify-content-between align-items-center">
            <!-- Left Side: Contact Info -->
            <div class="d-flex align-items-center">
                <small class="me-3 d-none d-sm-inline"><i class="fas fa-phone-alt me-1"></i> +255 673 443 706</small>
                <small class="d-none d-sm-inline"><i class="fas fa-envelope me-1"></i> kenseepexecutivefireworks@gmail.com</small>
                <small class="d-sm-none"><i class="fas fa-phone-alt"></i> +255 673 443 706</small>
            </div>

            <!-- Right Side: Social Media Icons -->
            <div class="d-flex">
                <a href="#" class="text-white d-none d-sm-inline me-3"><i class="fab fa-instagram"></i></a>
                <a href="#" class="text-white d-none d-sm-inline me-3"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="text-white d-none d-sm-inline me-3"><i class="fab fa-youtube"></i></a>
                <a href="#" class="text-white me-3"><i class="fab fa-whatsapp"></i></a>
            </div>
        </div>
    </div>

        <nav class="navbar navbar-expand-lg bg-white navbar-light px-4">
            <!-- Sidebar Toggle Button for Medium and Small Screens -->
            <button class="navbar-toggler d-lg-none order-1" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Logo remains as before -->
            <a href="#" class="navbar-brand d-flex align-items-center text-center">
                <div class="icon p-2 me-2">
                    <img class="img-fluid" src="{{ asset('assets/images/icon-deal.png') }}" alt="Icon" style="width: 30px; height: 30px;">
                </div>
            </a>

            <!-- Profile at the Right -->

            <div class="collapse navbar-collapse d-lg-flex d-none" id="navbarCollapse">
                <div class="navbar-nav ms-auto">
                    <a href="{{ url('/') }}" class="nav-item nav-link {{ Request::is('/') ? 'active' : '' }}">Home</a>
                    <a href="{{ url('/product_list') }}" class="nav-item nav-link {{ Request::is('product_list') ? 'active' : '' }}">Products</a>
                    <a href="{{ url('/book') }}" class="nav-item nav-link {{ Request::is('book') ? 'active' : '' }}">Booking</a>
                    <a href="{{ url('/contact') }}" class="nav-item nav-link {{ Request::is('contact') ? 'active' : '' }}">Contact</a>
                </div>

            </div>
              <div class="d-flex align-items-center ms-auto">

                @auth
                    <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="fa fa-user text-black"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end bg-white text-center p-3 rounded shadow-lg border-0" aria-labelledby="drop2">
                        <div class="d-flex flex-column align-items-center">
                            <div class="text-dark fw-bold">{{ Auth::user()->name }}</div>
                            <a href="{{ route('my-dashboard') }}" class="text-dark text-decoration-none mt-2 mb-2 px-3 py-1 rounded">My Dashboard</a>
                            <form method="POST" action="{{ route('logout') }}" class="w-100">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm w-100 fw-bold ">Logout</button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary px-3 d-none d-lg-flex">Login</a>
                @endauth
            </div>
        </nav>

        <style>
            /* Custom offcanvas style to make it open halfway */
            #sidebarMenu {
                height: 50vh; /* Half the viewport height */
                top: auto;
                bottom: 0;
            }

            /* Ensure it's visible properly */
            .offcanvas.offcanvas-start {
                transform: translateX(-100%); /* Initially hidden */
            }

            .offcanvas.show {
                transform: translateX(0); /* Slide it in */
            }
        </style>

        <div class="offcanvas offcanvas-start d-lg-none" tabindex="-1" id="sidebarMenu">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title">Menu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
            </div>
            <div class="offcanvas-body">
                <div class="navbar-nav">
                    <a href="{{ url('/') }}" class="nav-item nav-link active">Home</a>
                    <a href="{{ url('/product_list') }}" class="nav-item nav-link active">Products</a>
                    <a href="{{ url('/book') }}" class="nav-item nav-link active">Booking</a>
                    <a href="{{ url('/contact') }}" class="nav-item nav-link">Contact</a>
                </div>
            </div>
        </div>


</header>

@include('elements.toastr')

<style>
    header {
    position: relative;
    top: 0;
    left: 0;
    width: 100%;
    background-color: white;
    z-index: 1050; /* Ensures it's above most elements */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}
</style>


<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>

