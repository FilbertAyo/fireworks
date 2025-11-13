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

                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-3 gap-3">
                        <h5 class="card-title fw-semibold mb-0">List of Customers</h5>
                        <form action="{{ url('/customers') }}" method="GET" class="d-flex w-100 w-md-auto"
                            role="search">
                            <input type="text" name="search" value="{{ request()->input('search') }}"
                                class="form-control" placeholder="Search Name or Email">
                            <button type="submit" class="btn btn-primary ms-2">Search</button>
                        </form>
                    </div>

                    <div class="col-lg-12 d-flex align-items-stretch">
                        <div class="card w-100 shadow-none border ">
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
    <div class="modal fade" id="userDetailModal" tabindex="-1" aria-labelledby="userDetailModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="userDetailModalLabel">Customer Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <dl class="row">
                        <dt class="col-sm-4">Name</dt>
                        <dd class="col-sm-8" data-detail="name">-</dd>

                        <dt class="col-sm-4">Email</dt>
                        <dd class="col-sm-8" data-detail="email">-</dd>

                        <dt class="col-sm-4">Phone</dt>
                        <dd class="col-sm-8" data-detail="phone">-</dd>

                        <dt class="col-sm-4">Role</dt>
                        <dd class="col-sm-8" data-detail="role">-</dd>

                        <dt class="col-sm-4">Status</dt>
                        <dd class="col-sm-8" data-detail="status">-</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const userDetailModal = document.getElementById('userDetailModal');
            if (!userDetailModal) {
                return;
            }

            userDetailModal.addEventListener('show.bs.modal', function (event) {
                const trigger = event.relatedTarget;
                if (!trigger) {
                    return;
                }

                const details = {
                    name: trigger.getAttribute('data-bs-name'),
                    email: trigger.getAttribute('data-bs-email'),
                    phone: trigger.getAttribute('data-bs-phone'),
                    role: trigger.getAttribute('data-bs-role'),
                    status: trigger.getAttribute('data-bs-userStatus')
                };

                Object.entries(details).forEach(([key, value]) => {
                    const target = userDetailModal.querySelector(`[data-detail="${key}"]`);
                    if (target) {
                        target.textContent = value ?? '-';
                    }
                });
            });
        });
    </script>
</x-app-layout>
