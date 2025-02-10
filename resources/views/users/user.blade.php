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
                        <h5 class="card-title fw-semibold ">List of Experts</h5>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            New Expert
                        </button>
                    </div>

                    <div class="col-lg-12 d-flex align-items-stretch">
                        <div class="card w-100">
                            <div class="card-body p-4">

                                <div class="table-responsive">
                                    <table class="table text-nowrap mb-0 align-middle table-bordered">
                                        <thead class="text-dark fs-4">
                                            <tr>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Id</h6>
                                                </th>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Name</h6>
                                                </th>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Contacts</h6>
                                                </th>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Role</h6>
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
                                            @foreach ($users as $index => $user)
                                                <tr>
                                                    <td class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">{{ $index + 1 }}</h6>
                                                    </td>
                                                    <td class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-1">{{ $user->name }}</h6>
                                                    </td>
                                                    <td class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-1">{{ $user->phone }}</h6>
                                                        <span class="fw-normal">{{ $user->email }}</span>
                                                    </td>
                                                    <td class="border-bottom-0">

                                                        @if ($user->userType == 0)
                                                            Admin
                                                        @else
                                                            Expert
                                                        @endif

                                                    </td>
                                                    <td class="border-bottom-0">
                                                        @if ($user->user_status == 'active')
                                                            <span
                                                                class="badge bg-success rounded-3 fw-semibold">Active</span>
                                                        @elseif ($user->user_status == 'Assigned')
                                                            <span
                                                                class="badge bg-danger rounded-3 fw-semibold">Assigned</span>
                                                        @endif


                                                    </td>
                                                    <td class="border-bottom-0">
                                                        {{-- <a href=""><i class="ti ti-trash"></i></a> --}}
                                                        <a href="#" data-bs-toggle="modal"
                                                            class="badge bg-warning" data-bs-target="#userDetailModal"
                                                            data-bs-name="{{ $user->name }}"
                                                            data-bs-phone="{{ $user->phone }}"
                                                            data-bs-email="{{ $user->email }}"
                                                            data-bs-userType="{{ $user->userType }}"
                                                            data-bs-userStatus="{{ $user->user_status }}">
                                                            View
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
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
                    <h5 class="modal-title" id="exampleModalLabel">New Expert</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ url('/register') }}">
                        @csrf
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

                        <div class="mb-3">
                            <label for="email" class="form-label">User Role</label>
                            <select name="userType" id="" class="form-control">
                                <option value="0">Admin</option>
                                <option value="1">Expert</option>
                            </select>
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

                        <!-- Confirm Password -->
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

    <div class="modal fade" id="userDetailModal" tabindex="-1" aria-labelledby="userDetailModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="userDetailModalLabel">User Details <span id="userType"
                            class="badge bg-dark mx-1 fs-1"></span></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center p-5">

                    <img src="{{ asset('assets/images/profile.jpeg') }}" alt="Profile Image"
                        class="rounded-circle mx-auto mb-3" style="width: 120px; height: 120px; object-fit: cover;">
                    <!-- User Details -->
                    <div class="card-body">
                        <h5 class="card-title mb-1" id="userName">User Name</h5>
                        <p class="card-text mb-1" id="userPhone">Phone: </p>
                        <p class="card-text" id="userEmail">Email: </p>
                        <a href="#" data-bs-toggle="modal"
                        data-bs-target="#exampleModal4"
                        data-bs-id=""
                        class="btn bg-danger text-white deactivate-user">
                        Deactivate
                     </a>

                    </div>



                </div>

            </div>
        </div>


    </div>

    <div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <form method="POST" id="deactivateForm">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="user_id" id="deactivateUserId">

                        <div class="mt-3">
                            <h5>Are you sure you want to deactivate <span id="deactivateUserName"></span>?</h5>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn bg-danger text-white" data-bs-dismiss="modal">No</button>
                            <button type="submit" class="btn btn-primary">Yes, Deactivate</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var userDetailModal = document.getElementById('userDetailModal');
            var deactivateModal = document.getElementById('exampleModal4');

            userDetailModal.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget;
                var userId = button.getAttribute('data-bs-id');
                var name = button.getAttribute('data-bs-name');
                var phone = button.getAttribute('data-bs-phone');
                var email = button.getAttribute('data-bs-email');
                var userType = button.getAttribute('data-bs-userType');
                var userStatus = button.getAttribute('data-bs-userStatus');

                document.getElementById('userName').textContent = name;
                document.getElementById('userPhone').textContent = "Phone: " + phone;
                document.getElementById('userEmail').textContent = "Email: " + email;

                if (userType == 0) {
                    document.getElementById('userType').textContent = "Admin";
                } else {
                    document.getElementById('userType').textContent = "Expert";
                }

                var deactivateBtn = document.querySelector('.deactivate-user');
                deactivateBtn.setAttribute('data-bs-id', userId);
            });

            deactivateModal.addEventListener('show.bs.modal', function(event) {
                var button = document.querySelector('.deactivate-user');
                var userId = button.getAttribute('data-bs-id');
                var userName = document.getElementById('userName').textContent;

                document.getElementById('deactivateUserName').textContent = userName;
                document.getElementById('deactivateUserId').value = userId;

                document.getElementById('deactivateForm').setAttribute('action', '/deactivate/' + userId);
            });
        });
    </script>


</x-app-layout>
