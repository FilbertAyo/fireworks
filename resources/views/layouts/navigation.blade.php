
@php
    $user = Auth::user();
    $primaryRole = $user?->roles->first()->name ?? '';
@endphp

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
                <a class="nav-link nav-icon-hover d-flex align-items-center" href="javascript:void(0)" id="drop2"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{ asset('assets/images/profile.jpeg') }}" alt="" width="35" height="35"
                        class="rounded-circle">
                    <div class="d-none d-md-block ms-2 text-start">
                        <span class="fw-semibold d-block">{{ $user?->name }}</span>
                        @if ($primaryRole)
                            <small class="text-muted text-uppercase">{{ $primaryRole }}</small>
                        @endif
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2" style="min-width: 220px; border-radius: 10px; box-shadow: 0 8px 24px rgba(0,0,0,0.09);">
                    <div class="py-3 px-3">

                        <a href="{{ route('profile.edit') }}" class="dropdown-item d-flex align-items-center gap-2" style="font-weight: 500;">
                            <i class="ti ti-user fs-5 text-primary"></i> Profile
                        </a>

                        <div class="dropdown-divider my-2"></div>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item d-flex align-items-center gap-2 text-danger" style="font-weight: 500;">
                                <i class="ti ti-logout fs-5"></i> Logout
                            </button>
                        </form>

                    </div>
                </div>
            </li>
        </ul>
    </div>
</nav>

