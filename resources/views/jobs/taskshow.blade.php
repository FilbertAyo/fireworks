<x-app-layout>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">

        @include('layouts.aside')

        <div class="body-wrapper">
            <!--  Header Start -->
            @include('layouts.navigation')
            <!--  Header End -->

            <div class="mx-5 my-3">
                <div class="col-lg-12">
                    <div class="row g-3 mb-4">
                        <div class="col-md-4">
                            <div class="card shadow-none border h-100">
                                <div class="card-body">
                                    <p class="text-muted text-uppercase mb-1">Task Status</p>
                                    @if ($task->task_status == 'Pending')
                                        <span class="badge bg-warning text-dark px-3 py-2">{{ $task->task_status }}</span>
                                    @elseif ($task->task_status == 'Completed')
                                        <span class="badge bg-success px-3 py-2">{{ $task->task_status }}</span>
                                    @else
                                        <span class="badge bg-secondary px-3 py-2">{{ $task->task_status }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card shadow-none border h-100">
                                <div class="card-body">
                                    <p class="text-muted text-uppercase mb-1">Payment Status</p>
                                    <h5 class="mb-1">{{ ucfirst($task->payment_status) }}</h5>
                                    <p class="mb-0">
                                        @if ($task->payment_status == 'Paid')
                                            <span class="badge bg-success px-3 py-2">Cleared</span>
                                        @else
                                            <span class="badge bg-danger px-3 py-2">Pending Payment</span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card shadow-none border h-100">
                                <div class="card-body d-flex flex-column justify-content-between">
                                    <div class="d-flex align-items-start justify-content-between">
                                        <div>
                                            <p class="text-muted text-uppercase mb-1">Task Actions</p>
                                            <small class="text-muted d-block">Use the actions below to update task
                                                progress.
                                            </small>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-wrap gap-2 mt-3">
                                        @if ($task->payment_status == 'Not Paid' && Auth::user()->hasRole('admin'))
                                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                Update Payment
                                            </button>
                                        @elseif ($task->payment_status == 'Paid' && Auth::user()->hasRole('admin') && $task->task_status == 'Pending')
                                            <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal2">
                                                Mark as Done
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card shadow-none border">
                        <div class="card-header bg-white border-0 pb-0">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title fw-semibold mb-0">Task Details</h5>
                                <span class="text-muted">#{{ $task->id }}</span>
                            </div>
                        </div>
                        <div class="card-body pt-3">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="p-3 rounded border">
                                        <p class="text-muted text-uppercase fw-medium mb-2">Event Information</p>
                                        <p class="mb-2"><strong>Task Name:</strong> {{ $task->task_name }}</p>
                                        <p class="mb-2"><strong>Event Date:</strong> {{ $task->event_date }}</p>
                                        <p class="mb-2"><strong>Event Time:</strong> {{ $task->event_time }}</p>
                                        <p class="mb-0"><strong>Event Address:</strong> {{ $task->event_address }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="p-3 rounded border">
                                        <p class="text-muted text-uppercase fw-medium mb-2">Client Contact</p>
                                        <p class="mb-2"><strong>Phone:</strong> {{ $task->event_phone }}</p>
                                        <p class="mb-2"><strong>Email:</strong> {{ $task->event_email }}</p>
                                        <p class="mb-2">
                                            <strong>Assignment Status:</strong>
                                            @if ($assignedUsers->isEmpty())
                                                <span class="badge bg-danger ms-1">Not Assigned</span>
                                            @else
                                                <span class="badge bg-secondary ms-1">Assigned</span>
                                            @endif
                                        </p>
                                        <p class="mb-0"><strong>Description:</strong></p>
                                        <p class="mb-0 text-muted">{{ $task->task_description }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if (Auth::user()->hasRole('admin'))
                        <div class="card shadow-none border">
                            <div class="card-header bg-white border-0">
                                <h5 class="card-title fw-semibold mb-0">Payment Details</h5>
                            </div>
                            <div class="card-body">
                                <table class="table table-borderless align-middle mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-muted text-uppercase">Total Amount</th>
                                            <th class="text-muted text-uppercase text-end">Payment Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="fw-bold fs-5">TZS {{ number_format($task->total_amount) }}/=</td>
                                            <td class="text-end">
                                                <span class="badge {{ $task->payment_status == 'Paid' ? 'bg-success' : 'bg-danger' }} px-3 py-2">
                                                    {{ ucfirst($task->payment_status) }}
                                                </span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif

                    <div class="card shadow-none border mt-4">
                        <div class="card-header bg-white border-0">
                            <h5 class="card-title fw-semibold mb-0">Selected Products</h5>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                            @forelse ($products as $product)
                                <div class="col-md-3">
                                    <div class="card shadow-none border h-100">
                                        <img src="{{ asset($product->product_image) }}" class="card-img-top"
                                            alt="Product Image" style="height: 180px; object-fit: cover;">
                                        <div class="card-body">
                                            <h6>{{ $product->product_name }}</h6>
                                            <p><strong>Price:</strong> TZS {{ $product->product_price }}/=</p>
                                            <p><strong>Quantity:</strong> {{ $product->product_quantity }}</p>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12">
                                    <div class="alert alert-warning mb-0">No products selected for this task.</div>
                                </div>
                            @endforelse
                            </div>
                        </div>
                    </div>


                    <div class="card shadow-none border mt-4">
                        <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center">
                            <h5 class="card-title fw-semibold mb-0">Assigned Experts</h5>
                            @if (Auth::user()->hasRole('admin') && $task->task_status == 'Pending')
                                <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#assignTaskModal">Add Expert</a>
                            @endif
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                            @forelse ($assignedUsers as $user)
                                <div class="col-md-4">
                                    <div class="card shadow-none border text-center h-100">
                                        <!-- Rounded Profile Image -->
                                        <img src="{{ asset('assets/images/profile.jpeg') }}" alt="Profile Image"
                                            class="rounded-circle mx-auto mt-3"
                                            style="width: 100px; height: 100px; object-fit: cover;">
                                        <!-- User Details -->
                                        <div class="card-body">
                                            <h5 class="card-title mb-1">{{ $user->name }}</h5>
                                            <p class="card-text mb-1">{{ $user->phone }}</p>
                                            <p class="card-text">{{ $user->email }}</p>
                                        </div>
                                    </div>
                                </div>
                            @empty

                                <div class="col-12">
                                    <div class="alert alert-danger text-center mb-0">No Experts assigned for this task.</div>
                                </div>
                            @endforelse
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Modal -->
                <div class="modal fade" id="assignTaskModal" tabindex="-1" aria-labelledby="assignTaskModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-xl"> <!-- Changed to modal-xl for extra-large width -->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="assignTaskModalLabel">Assign Task</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h6 class="mb-3">Select Experts to assign this task:</h6>
                                <form action="{{ route('assignments.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="task_id" value="{{ $task->id }}">
                                    <div class="row g-3"> <!-- Added spacing between cards -->
                                        @forelse ($users as $user)
                                            <div class="col-md-3"> <!-- Reduced column size for smaller cards -->
                                                <div class="card shadow-none border text-center p-3">
                                                    <!-- Rounded Profile Image -->
                                                    <img src="{{ asset('assets/images/profile.jpeg') }}"
                                                        alt="Profile Image" class="rounded-circle mx-auto"
                                                        style="width: 60px; height: 60px; object-fit: cover;">
                                                    <!-- User Details -->
                                                    <div class="card-body">
                                                        <h6 class="card-title text-truncate mb-1"
                                                            title="{{ $user->name }}">{{ $user->name }}</h6>
                                                        <p class="card-text text-truncate mb-1"
                                                            title="{{ $user->phone }}">{{ $user->phone }}</p>
                                                        <p class="card-text text-truncate" title="{{ $user->email }}">
                                                            {{ $user->email }}</p>

                                                        <input class="form-check-input" type="checkbox" name="users[]"
                                                            value="{{ $user->id }}" id="user{{ $user->id }}">
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <div class="text-center text-danger">
                                                <p>No Experts available to assign the task.</p>
                                            </div>
                                        @endforelse
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Assign Task</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>



    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Payment Update</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('task.update', $task->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <h5>Are you sure this task is Paid?</h5>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Paid and Close</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Task Update</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('task_done', $task->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <h5>Is this Task already Completed?</h5>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Yes</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>

                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
</x-app-layout>
