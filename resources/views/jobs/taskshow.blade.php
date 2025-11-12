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
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="card-title fw-semibold ">Task Details
                             @if ($task->task_status == 'Pending')
                                <span class="badge bg-warning">{{ $task->task_status }}</span>
                            @elseif ($task->task_status == 'Completed')
                                <span class="badge bg-success">{{ $task->task_status }}</span>
                            @endif
                        </h5>

                        @if ($task->payment_status == 'Not Paid' && Auth::user()->hasRole('admin'))
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Update Payment
                            </button>
                        @elseif ($task->payment_status == 'Paid'&& Auth::user()->hasRole('admin') && $task->task_status == 'Pending')
                        <button type="button" class="badge bg-success" data-bs-toggle="modal"
                        data-bs-target="#exampleModal2">
                        Is Task Done?
                    </button>
                        @endif

                    </div>

                    <div class="card mt-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <p><strong>Task Name:</strong> {{ $task->task_name }}</p>
                                    <p><strong>Event Date:</strong> {{ $task->event_date }}</p>
                                    <p><strong>Event Time:</strong> {{ $task->event_time }}</p>
                                    <p><strong>Event Address:</strong> {{ $task->event_address }}</p>
                                </div>
                                <div class="col-md-6">
                                    <p><strong>Contact Phone:</strong> {{ $task->event_phone }}</p>
                                    <p><strong>Contact Email:</strong> {{ $task->event_email }}</p>
                                    <p><strong>Description:</strong> {{ $task->task_description }}</p>
                                    <p><strong>Assignment Status:</strong>

                                        @if ($assignedUsers->isEmpty())
                                            <span class="badge bg-danger">Not Assigned</span>
                                        @else
                                            <span class="badge bg-secondary">Assigned</span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if (Auth::user()->hasRole('admin'))
                        <div class="card-body">
                            <h5 class="card-title fw-semibold mb-3">Payment Details</h5>
                            <div class="card p-3">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Total Amount</th>
                                            <th>Payment Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <h4 class="fw-bold">TZS {{ number_format($task->total_amount) }}/=</h4>
                                            </td>
                                            <td>
                                                <h4
                                                    class="{{ $task->payment_status == 'Paid' ? 'text-success' : 'text-danger' }}">
                                                    {{ ucfirst($task->payment_status) }}
                                                </h4>
                                            </td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif

                    <div class="card-body">
                        <h5 class="card-title fw-semibold mb-3">Selected Products</h5>
                        <div class="row">
                            @forelse ($products as $product)
                                <div class="col-md-3 mb-3">
                                    <div class="card">
                                        <img src="{{ asset($product->product_image) }}" class="card-img-top"
                                            alt="Product Image">
                                        <div class="card-body">
                                            <h6>{{ $product->product_name }}</h6>
                                            <p><strong>Price:</strong> TZS {{ $product->product_price }}/=</p>
                                            <p><strong>Quantity:</strong> {{ $product->product_quantity }}</p>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p>No products selected for this task.</p>
                            @endforelse

                        </div>
                    </div>


                    <div class="card-body">
                        <h5 class="card-title fw-semibold mb-3">Assigned Experts</h5>
                        <div class="row">
                            @forelse ($assignedUsers as $user)
                                <div class="col-md-4 mb-3">
                                    <div class="card text-center">
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

                                <div class="mb-3 text-center">
                                    <div class="alert alert-danger">No Experts assigned for this task.</div>
                                </div>
                            @endforelse

                            @if (Auth::user()->hasRole('admin') && $task->task_status == 'Pending' )
                                <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#assignTaskModal">Add Expert</a>
                            @endif

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
                                                <div class="card text-center p-3">
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
