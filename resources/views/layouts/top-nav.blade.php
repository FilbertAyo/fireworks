<header>

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
                        <img src="{{ asset('assets/images/profile.jpeg') }}" alt="" width="35" height="35" class="rounded-circle">
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

        <!-- Sidebar Navigation for Medium and Small Screens -->
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

</header>


<script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">

<script>
    @if (session('success'))
        swal("Success!", "{{ session('success') }}", "success");
    @elseif (session('error'))
        swal("Oops!", "{{ session('error') }}", "error");
    @endif
</script>


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

