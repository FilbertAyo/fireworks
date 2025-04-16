<style>
    /* Custom offcanvas style to make it open halfway */
    #sidebarMenu {
        height: 50vh;
        /* Half the viewport height */
        top: auto;
        bottom: 0;
    }

    /* Ensure it's visible properly */
    .offcanvas.offcanvas-start {
        transform: translateX(-100%);
        /* Initially hidden */
    }

    .offcanvas.show {
        transform: translateX(0);
        /* Slide it in */
    }

    .nav-link {
        color: #777;
    }

    .nav-link.active {
        color: #dc3545;
        font-weight: bold;
    }


</style>

<header>
    <div class="top-bar text-muted py-2" style="background-color: #fff;">
        <div class="container d-flex justify-content-between align-items-center">
            <!-- Left Side: Contact Info -->
            <div class="d-flex align-items-center">
                <small class="me-3 d-none d-sm-inline"><i class="fas fa-phone-alt me-1"></i> +255 673 443 706</small>
                <small class="d-none d-sm-inline"><i class="fas fa-envelope me-1"></i>
                    kenseepexecutivefireworks@gmail.com</small>
                <small class="d-sm-none"><i class="fas fa-phone-alt"></i> +255 673 443 706</small>
            </div>

            <!-- Right Side: Social Media Icons -->
            <div class="d-flex">
                <a href="https://www.instagram.com/kenseep_executive_fireworks?igsh=MTA4dmo2a2VkYzRvMg=="
                    class="text-muted me-3"><i class="fab fa-instagram"></i></a>
                <a href="https://youtube.com/@kenseepexecutives?si=V8s0AXSfindcoN2_" class="text-muted me-3"><i
                        class="fab fa-youtube"></i></a>
                <a href="https://www.tiktok.com/@kenseep_executives?_t=ZM-8vPOZMDNAFa&_r=1" class="text-muted me-3"><img
                        src="{{ asset('assets/images/tik-tokm.png') }}" alt=""></a>
                <a href="https://wa.me/255673443706?text=Hello%20I%20am%20interested%20in%20your%20services"
                    class="text-muted me-3" target="_blank">
                    <i class="fab fa-whatsapp"></i>
                </a>
                @auth

                {{-- Dashboard of the users --}}
                @if (Auth::user()->userType == 0 || Auth::user()->userType == 1)
                <a href="{{ route('dashboard') }}" class="text-muted"><i class="fa fa-home"></i></a>
                @else
                <a href="{{ route('my-dashboard') }}" class="text-muted"><i class="fa fa-home"></i></a>
                @endif

                @else
                    <a href="{{ route('login') }}" class="text-muted">Login</a>
                @endauth

            </div>
        </div>
    </div>


    <nav class="navbar navbar-expand-lg bg-white p-3">
        <!-- Sidebar Toggle Button for Medium and Small Screens -->
        <button class="navbar-toggler d-lg-none order-1 text-muted border" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#sidebarMenu">
            <i class="fas fa-bars"></i>
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
                <a href="{{ url('/') }}" class="nav-link me-3 {{ Request::is('/') ? 'active' : '' }}">HOME</a>
                <a href="{{ url('/product_list') }}" class="nav-link me-3 {{ Request::is('product_list') ? 'active' : '' }}">PRODUCTS</a>
                <a href="{{ url('/book') }}" class="nav-link me-3 {{ Request::is('book') ? 'active' : '' }}">BOOKING</a>
                <a href="{{ url('/contact') }}" class="nav-link {{ Request::is('contact') ? 'active' : '' }}">CONTACT</a>
            </div>
        </div>

        <div class="d-flex align-items-center ms-auto">

            @auth
            <li class="nav-item position-relative">
                <a href="#" class="nav-link position-relative text-dark" data-bs-toggle="offcanvas" data-bs-target="#cartOffcanvas">
                    <i class="fa fa-shopping-cart me-1 position-relative" style="font-size: 1.2rem;">
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 0.6rem;">
                            {{ count(session('cart', [])) }}
                        </span>
                    </i>
                    Cart
                </a>
            </li>


                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="fa fa-user text-black"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-end bg-white text-center p-3 rounded shadow-lg border-0"
                    aria-labelledby="drop2">
                    <div class="d-flex flex-column align-items-center">
                        <div class="text-dark fw-bold">{{ Auth::user()->name }}</div>
                        <a href="{{ route('my-dashboard') }}"
                            class="text-dark text-decoration-none mt-2 mb-2 px-3 py-1 rounded">My Dashboard</a>
                        <form method="POST" action="{{ route('logout') }}" class="w-100">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm w-100 fw-bold ">Logout</button>
                        </form>
                    </div>
                </div>

            @endauth
        </div>
    </nav>

    <div class="offcanvas offcanvas-start d-lg-none" tabindex="-1" id="sidebarMenu">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title">Menu</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body">
            <div class="navbar-nav d-flex flex-column gap-3">
                <a href="{{ url('/') }}" class="nav-link {{ Request::is('/') ? 'active' : '' }}">HOME</a>
                <a href="{{ url('/product_list') }}" class="nav-link {{ Request::is('product_list') ? 'active' : '' }}">PRODUCTS</a>
                <a href="{{ url('/book') }}" class="nav-link {{ Request::is('book') ? 'active' : '' }}">BOOKING</a>
                <a href="{{ url('/contact') }}" class="nav-link {{ Request::is('contact') ? 'active' : '' }}">CONTACT</a>
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
        z-index: 1050;
        /* Ensures it's above most elements */
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
</style>


<div id="spinner"
    class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
