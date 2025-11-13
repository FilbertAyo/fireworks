@extends('layouts.front')

@section('title', 'Booking Details | KENSEEP Executive Fireworks')

@section('content')
@php
    $eventDate = $task->event_date ? \Carbon\Carbon::parse($task->event_date) : null;
    $eventTime = $task->event_time ? \Carbon\Carbon::parse($task->event_time) : null;
@endphp
<section class="section py-5 bg-body-tertiary">
    <div class="container d-flex flex-column flex-lg-row align-items-lg-center justify-content-between gap-3">
        <div>
            <span class="subtitle text-uppercase mb-2 d-inline-block">Booking Overview</span>
            <h1 class="mb-3">Your Fireworks Experience</h1>
            <p class="mb-0 text-muted">Review the key details for your event, including products selected and the specialist crew supporting you.</p>
        </div>
        <a href="{{ route('my-dashboard') }}" class="btn btn-white-outline">
            <i class="bi bi-arrow-left me-2"></i> Back to Dashboard
        </a>
    </div>
</section>

<section class="section pb-5">
    <div class="container">
        <div class="row gy-4">
            <div class="col-12">
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-header bg-body-tertiary border-0 rounded-top-4 py-4">
                        <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
                            <div>
                                <span class="badge bg-primary-subtle text-primary rounded-pill px-3 py-2 text-uppercase">Booking {{ $task->task_status }}</span>
                                <h2 class="h4 fw-bold mb-0 mt-3 mt-md-0">{{ $task->task_name }}</h2>
                            </div>
                            <div class="text-md-end">
                                <p class="mb-1 text-muted"><i class="bi bi-calendar-event me-2"></i>{{ optional($eventDate)->format('l, d M Y') ?? 'Date to be confirmed' }}</p>
                                <p class="mb-0 text-muted"><i class="bi bi-clock me-2"></i>{{ optional($eventTime)->format('h:i A') ?? ($task->event_time ?: 'Time to be confirmed') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-4 p-lg-5">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <h3 class="h6 text-uppercase text-muted mb-3">Event Contact</h3>
                                <p class="mb-2"><i class="bi bi-telephone me-2 text-primary"></i><strong>Phone:</strong> {{ $task->event_phone }}</p>
                                <p class="mb-2"><i class="bi bi-envelope me-2 text-primary"></i><strong>Email:</strong> {{ $task->event_email }}</p>
                                <p class="mb-0"><i class="bi bi-geo-alt me-2 text-primary"></i><strong>Location:</strong> {{ $task->event_address }}</p>
                            </div>
                            <div class="col-md-6">
                                <h3 class="h6 text-uppercase text-muted mb-3">Booking Status</h3>
                                <p class="mb-2">
                                    <i class="bi bi-credit-card me-2 text-primary"></i>
                                    <strong>Payment Status:</strong>
                                    <span class="badge rounded-pill {{ $task->payment_status === 'Paid' ? 'bg-success-subtle text-success' : 'bg-warning-subtle text-warning' }}">
                                        {{ ucfirst($task->payment_status) }}
                                    </span>
                                </p>
                                <p class="mb-0">
                                    <i class="bi bi-people me-2 text-primary"></i>
                                    <strong>Expert Crew:</strong>
                                    @if ($assignedUsers->isEmpty())
                                        <span class="badge bg-danger-subtle text-danger rounded-pill">Not Assigned</span>
                                    @else
                                        <span class="badge bg-success-subtle text-success rounded-pill">Assigned</span>
                                    @endif
                                </p>
                            </div>
                            <div class="col-12">
                                <h3 class="h6 text-uppercase text-muted mb-3">Briefing Notes</h3>
                                <div class="p-3 p-md-4 bg-body-tertiary rounded-4">
                                    <p class="mb-0">{{ $task->task_description ?: 'No additional notes provided.' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body p-4 p-lg-5">
                        <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">
                            <h3 class="h5 fw-bold mb-0">Selected Fireworks</h3>
                            <span class="badge bg-dark-subtle text-dark rounded-pill px-3 py-2">{{ $products->count() }} item(s)</span>
                        </div>
                        @if($products->isEmpty())
                            <p class="text-muted mb-0">No products selected for this booking.</p>
                        @else
                            <div class="row g-4">
                                @foreach ($products as $product)
                                    <div class="col-sm-6 col-lg-3">
                                        <div class="card h-100 border-0 shadow-sm rounded-4">
                                            <img src="{{ asset($product->product_image) }}" class="card-img-top rounded-top-4" alt="{{ $product->product_name }}">
                                            <div class="card-body">
                                                <h5 class="h6 fw-bold mb-1">{{ $product->product_name }}</h5>
                                                <p class="mb-1 text-muted small">Quantity: {{ $product->product_quantity }}</p>
                                                <p class="mb-0 text-primary fw-semibold">TZS {{ number_format($product->product_price) }}/=</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body p-4 p-lg-5">
                        <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">
                            <h3 class="h5 fw-bold mb-0">Expert Crew</h3>
                            <p class="mb-0 text-muted">Certified technicians who will oversee your show.</p>
                        </div>
                        @if($assignedUsers->isEmpty())
                            <p class="text-muted mb-0">Crew assignment is in progress. We’ll notify you once your specialist team is confirmed.</p>
                        @else
                            <div class="row g-4">
                                @foreach ($assignedUsers as $user)
                                    <div class="col-md-4">
                                        <div class="card h-100 border-0 shadow-sm rounded-4 text-center p-4">
                                            <img src="{{ asset('assets/images/profile.jpeg') }}" alt="Profile Image"
                                                 class="rounded-circle mx-auto mb-3" style="width: 100px; height: 100px; object-fit: cover;">
                                            <h4 class="h6 fw-semibold mb-1">{{ $user->name }}</h4>
                                            <p class="mb-1 text-muted">{{ $user->phone }}</p>
                                            <p class="mb-0 text-muted small">{{ $user->email }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
