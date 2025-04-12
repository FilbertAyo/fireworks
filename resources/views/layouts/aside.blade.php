<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>

        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Home</span>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('dashboard') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-layout-dashboard"></i>
                        </span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                @if (Auth::user()->userType == 0 || Auth::user()->userType == 1)
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ url('/mytask') }}" aria-expanded="false">
                            <span>
                                <i class="ti ti-alert-circle"></i>
                            </span>
                            <span class="hide-menu">My Tasks</span>
                        </a>
                    </li>
                @endif

                @if (Auth::user()->userType == 0)
                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">Users</span>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ url('/users') }}" aria-expanded="false">
                            <span>
                                <i class="ti ti-users"></i>
                            </span>
                            <span class="hide-menu">Team</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ url('/customers') }}" aria-expanded="false">
                            <span>
                                <i class="ti ti-users"></i>
                            </span>
                            <span class="hide-menu">Customers</span>
                        </a>
                    </li>

                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">JOBS</span>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('task.index') }}" aria-expanded="false">
                            <span>
                                <i class="ti ti-article"></i>
                            </span>
                            <span class="hide-menu">Task</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('assignments.index') }}" aria-expanded="false">
                            <span>
                                <i class="ti ti-checklist"></i>
                            </span>
                            <span class="hide-menu">Assignment</span>
                        </a>
                    </li>
                    @endif


                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">Settings</span>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('products.index') }}" aria-expanded="false">
                            <span><i class="ti ti-checklist"></i></span>
                            <span class="hide-menu">Products</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ url('/category') }}" aria-expanded="false">
                            <span><i class="ti ti-list"></i></span>
                            <span class="hide-menu">Category</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ url('/partner') }}" aria-expanded="false">
                            <span><i class="ti ti-list"></i></span>
                            <span class="hide-menu">Partners</span>
                        </a>
                    </li>
            </ul>
            <div class="unlimited-access hide-menu bg-light-danger position-relative mb-7 mt-5 rounded">
                <div class="d-flex">
                    <div class="unlimited-access-title " style="margin-right: 70px;">
                        <h6 class="fw-semibold fs-4 mb-6 text-dark w-85">Kenseep</h6>
                        <a href="http://127.0.0.1:8000/" target="_blank"
                            class="btn btn-danger fs-2 fw-semibold lh-sm">View website</a>
                    </div>
                    <div class="unlimited-access-img">
                        <img src="{{ asset('assets/images/icon-deal.png') }}" alt="" class="img-fluid"
                            style="height: 90px">
                    </div>
                </div>
            </div>
        </nav>

    </div>

</aside>
