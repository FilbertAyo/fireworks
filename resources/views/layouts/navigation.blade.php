
<nav class="navbar navbar-expand-lg navbar-light bg-light px-3">
    <ul class="navbar-nav">
        <li class="nav-item d-block d-xl-none">
            <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                <i class="ti ti-bell-ringing"></i>
                {{-- <div class="notification bg-primary rounded-circle"></div>  --}}
            </a>
        </li>
    </ul>
    <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">

            <li class="nav-item dropdown">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <img src="{{ asset('assets/images/profile.jpeg') }}" alt="" width="35" height="35"
                        class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                    <div class="message-body">

                        <div class="px-3 py-1">
                            <h5>{{ Auth::user()->name }}</h5>
                            <h6>{{ Auth::user()->email }}</h6>
                        </div>
                        <x-responsive-nav-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-responsive-nav-link>


                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger mx-3 mt-2 d-block">Logout</button>
                        </form>


                    </div>
                </div>
            </li>
        </ul>
    </div>
</nav>

