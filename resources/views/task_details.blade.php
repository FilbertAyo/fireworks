@extends('layouts.front-app')

@section('content')
    <section class="section main-banner " id="top" data-section="section1"
        style="height: 20vh; background-image: url('{{ asset('assets/images/kenseep.jpg') }}');">
        <div class="video-overlay header-text text-center">
            <div class="container">
                <div class="row">
                    <div class="caption">
                        <h2 style="font-size: 30px;"><i class="fas fa-calendar-check me-2"></i> Booking Details</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container-fluid bg-primary mb-3" style="padding: 20px;">

    </div>

    <div class="container">
        <div class="tab-content mt-3" id="myTabsContent">
            <!-- My Bookings Tab -->
            <div class="tab-pane fade show active" id="bookings" role="tabpanel">
                <div class="container">
                    <div class="row">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title fw-semibold">Details</h5>
                            <a href="{{ route('my-dashboard') }}" class="badge bg-dark text-white">Go Back</a>
                        </div>

                        <div class="col-lg-12 d-flex align-items-stretch">
                            <div class="card mt-3 w-100 shadow-sm border-0 rounded-3">

                                <div class="card-body">
                                    <div class="row g-4">
                                        <div class="col-md-6">
                                            <p><strong><i class="fas fa-tasks me-2"></i>Task Name:</strong>
                                                {{ $task->task_name }}</p>
                                            <p><strong><i class="far fa-calendar-alt me-2"></i>Event Date:</strong>
                                                {{ $task->event_date }}</p>
                                            <p><strong><i class="far fa-clock me-2"></i>Event Time:</strong>
                                                {{ $task->event_time }}</p>
                                            <p
                                                class="{{ $task->payment_status == 'Paid' ? 'text-success' : 'text-danger' }}">
                                                <strong><i class="fas fa-credit-card me-2"></i>Payment Status:</strong>
                                                {{ ucfirst($task->payment_status) }}
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <p><strong><i class="fas fa-phone-alt me-2"></i>Contact Phone:</strong>
                                                {{ $task->event_phone }}</p>
                                            <p><strong><i class="fas fa-envelope me-2"></i>Contact Email:</strong>
                                                {{ $task->event_email }}</p>
                                            <p><strong><i class="fas fa-map-marker-alt me-2"></i>Event Location:</strong>
                                                {{ $task->event_address }}</p>
                                            <p><strong><i class="fas fa-user-check me-2"></i>Status:</strong>
                                                @if ($assignedUsers->isEmpty())
                                                    <span class="badge bg-danger">Not Assigned</span>
                                                @else
                                                    <span class="badge bg-success">Assigned</span>
                                                @endif
                                            </p>
                                        </div>
                                        <div class="col-12">
                                            <p><strong><i class="fas fa-file-alt me-2"></i>Task Description:</strong>
                                                {{ $task->task_description }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Add FontAwesome for icons -->
                            <script src="https://kit.fontawesome.com/YOUR_KIT_CODE.js" crossorigin="anonymous"></script>
                        </div>


                        <div class="col-lg-12 mt-4 ">

                            <h5 class="card-title fw-semibold mb-3">Selected Fireworks</h5>
                            <div class="row">
                                @forelse ($products as $product)
                                    <div class="col-6 col-md-3">
                                        <div class="card">
                                            <img src="{{ asset($product->product_image) }}" class="card-img-top"
                                                alt="Product Image">
                                            <div class="card-body">
                                                <span class="text-primary">{{ $product->product_name }}</span>
                                                <p><strong>Price:</strong>{{ number_format($product->product_price) }}</p>
                                                <p><strong>Quantity:</strong> {{ $product->product_quantity }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <p>No products selected for this task.</p>
                                @endforelse
                            </div>

                        </div>

                        <!-- Assigned Users Section -->
                        <div class="col-lg-12 mt-4">
                            <h5 class="card-title fw-semibold mb-3">Expert attendee</h5>
                            <div class="row">
                                @forelse ($assignedUsers as $user)
                                    <div class="col-md-4 mb-3">
                                        <div class="card text-center p-3">
                                            <!-- Rounded Profile Image -->
                                            <img src="{{ asset('assets/images/profile.jpeg') }}" alt="Profile Image"
                                                class="rounded-circle mx-auto"
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
                                    <p class="text-danger">No Experts assigned for your task yet.</p>
                                @endforelse
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        @if (session('success'))
            swal("Success!", "{{ session('success') }}", "success");
        @elseif (session('error'))
            swal("Oops!", "{{ session('error') }}", "error");
        @endif
    </script>
@endsection
