<header class="fbs__net-navbar navbar navbar-expand-lg dark" aria-label="freebootstrap.net navbar">
    <div class="container d-flex align-items-center justify-content-between">
      <!-- Start Logo-->
      <a class="navbar-brand w-auto" href="{{ url('/') }}">


        <!-- logo dark--><img class="logo dark img-fluid" src="{{ asset('assets/images/icon-deal.png') }}" alt="" style="width: 40px; height: 40px;">

      {{-- <img class="logo light img-fluid" src="assets/images/logo-light.svg"> --}}

        </a>
      <div class="offcanvas offcanvas-start w-75" id="fbs__net-navbars" tabindex="-1" aria-labelledby="fbs__net-navbarsLabel">

        <div class="offcanvas-header">
          <div class="offcanvas-header-logo">
            <a class="logo-link" id="fbs__net-navbarsLabel" href="{{ url('/') }}">
              <!-- logo dark--><img class="logo dark img-fluid" src="{{ asset('assets/images/icon-deal.png') }}" alt="" style="width: 40px; height: 40px;">

          </div>
          <button class="btn-close btn-close-black" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>

        <div class="offcanvas-body align-items-lg-center">


          <ul class="navbar-nav nav me-auto ps-lg-5 mb-2 mb-lg-0">
            <li class="nav-item"><a class="nav-link" aria-current="page" href="{{ url('/#home') }}">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/#about') }}">About</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/#services') }}">Services</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/product_list') }}">Products</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/#pricing') }}">Pricing</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('/#contact') }}">Contact</a></li>
          </ul>

          <div class="d-lg-none pt-4 border-top mt-4">
            @auth
              <a class="btn btn-white-outline w-100 mb-2 d-flex justify-content-center align-items-center gap-2" href="{{ route('my-dashboard') }}">
                <i class="bi bi-speedometer2"></i> Dashboard
              </a>
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-primary w-100 d-flex justify-content-center align-items-center gap-2">
                  <i class="bi bi-box-arrow-right"></i> Sign Out
                </button>
              </form>
            @else
              <a class="btn btn-primary w-100 mb-2 d-flex justify-content-center align-items-center gap-2" href="{{ route('login') }}">
                <i class="bi bi-box-arrow-in-right"></i> Sign In
              </a>
              <a class="btn btn-white-outline w-100 d-flex justify-content-center align-items-center gap-2" href="{{ route('register') }}">
                <i class="bi bi-person-plus"></i> Register
              </a>
            @endauth
          </div>

        </div>
      </div>
      <!-- End offcanvas-->

      <div class="ms-auto w-auto">
        <div class="header-social d-flex align-items-center gap-2">
          @auth
            <a class="btn btn-primary py-2 d-none d-lg-inline-flex align-items-center gap-2" href="{{ route('my-dashboard') }}">
              <i class="bi bi-speedometer2"></i> Dashboard
            </a>
            <form method="POST" action="{{ route('logout') }}" class="d-none d-lg-inline">
              @csrf
              <button type="submit" class="btn btn-primary py-2 d-none d-lg-inline-flex align-items-center gap-2">
                <i class="bi bi-box-arrow-right"></i> Sign Out
              </button>
            </form>
          @else
            <a class="btn btn-primary py-2 d-none d-lg-inline-flex align-items-center gap-2" href="{{ route('login') }}">
              <i class="bi bi-box-arrow-in-right"></i> Sign In
            </a>
            <a class="btn btn-primary py-2 d-none d-lg-inline-flex align-items-center gap-2" href="{{ route('register') }}">
              <i class="bi bi-person-plus"></i> Register
            </a>
          @endauth

          <button class="fbs__net-navbar-toggler justify-content-center align-items-center ms-auto" data-bs-toggle="offcanvas" data-bs-target="#fbs__net-navbars" aria-controls="fbs__net-navbars" aria-label="Toggle navigation" aria-expanded="false">
            <svg class="fbs__net-icon-menu" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <line x1="21" x2="3" y1="6" y2="6"></line>
              <line x1="15" x2="3" y1="12" y2="12"></line>
              <line x1="17" x2="3" y1="18" y2="18"></line>
            </svg>
            <svg class="fbs__net-icon-close" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M18 6 6 18"></path>
              <path d="m6 6 12 12"></path>
            </svg>
          </button>

        </div>
      </div>
    </div>
  </header>
  <!-- End Header-->
