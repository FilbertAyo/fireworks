<x-app-layout>


    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">

        @include('layouts.aside')

        <div class="body-wrapper">
            <!--  Header Start -->
            @include('layouts.navigation')
            <!--  Header End -->
            <div class="m-3">

                <div class="row">

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="card-title fw-semibold ">List of Customers</h5>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            New Customer
                        </button>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <form action="{{ url('/customers') }}" method="GET" class="d-flex">
                                <input type="text" name="search" value="{{ request()->input('search') }}"
                                    class="form-control" placeholder="Search Name or Email">
                                <button type="submit" class="btn btn-primary ms-2">Search</button>
                            </form>
                        </div>
                    </div>

                    <div class="col-lg-12 d-flex align-items-stretch">
                        <div class="card w-100">
                            <div class="card-body p-4">
                                <div class="table-responsive">
                                    <table class="table text-nowrap mb-0 align-middle table-bordered">
                                        <thead class="text-dark fs-4">
                                            <tr>
                                                <th>
                                                    Id
                                                </th>
                                                <th>
                                                    Name
                                                </th>
                                                <th>
                                                    Phone Number
                                                </th>
                                                <th>
                                                    Email
                                                </th>
                                                <th>
                                                    Status
                                                </th>
                                                <th>
                                                    Actions
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $index => $user)
                                                <tr>
                                                    <td>
                                                        {{ $index + 1 }}
                                                    </td>
                                                    <td>
                                                        {{ $user->name }}
                                                    </td>
                                                    <td>
                                                        {{ $user->phone }}
                                                    </td>
                                                    <td>
                                                        {{ $user->email }}
                                                    </td>

                                                    <td>
                                                        @if ($user->user_status == 'active')
                                                            <span class="alert alert-success p-1">Active</span>
                                                        @elseif ($user->user_status == 'Assigned')
                                                            <span
                                                                class="badge bg-danger rounded-3 fw-semibold">Assigned</span>
                                                        @endif

                                                    </td>
                                                    <td>
                                                        {{-- <a href=""><i class="ti ti-trash"></i></a> --}}
                                                        <a href="#" data-bs-toggle="modal"
                                                            class="badge bg-primary" data-bs-target="#userDetailModal"
                                                            data-bs-name="{{ $user->name }}"
                                                            data-bs-phone="{{ $user->phone }}"
                                                            data-bs-email="{{ $user->email }}"
                                                            data-bs-role="Customer"
                                                            data-bs-userStatus="{{ $user->user_status }}">
                                                            <i class="ti ti-eye"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>

                                <div class="d-flex justify-content-between mt-3">
                                    <div class="align-self-center">
                                        <p>Showing {{ $users->firstItem() }} to {{ $users->lastItem() }} of
                                            {{ $users->total() }} Customers</p>
                                    </div>
                                    <div class="align-self-center">
                                        {{ $users->links('vendor.pagination.bootstrap-4') }}
                                        <!-- Bootstrap pagination links -->
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Customer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('admin.users.store') }}">
                        @csrf

                        <input type="hidden" name="role" value="customer">
                        <!-- Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                id="name" name="name" value="{{ old('name') }}" required autocomplete="name"
                                autofocus>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Email Address -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                id="email" name="email" value="{{ old('email') }}" required
                                autocomplete="email">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                id="phone" name="phone" value="{{ old('phone') }}" required
                                autocomplete="phone">
                            @error('phone')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" name="password" required autocomplete="new-password">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password-confirm" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="password-confirm"
                                name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>




</x-app-layout>
