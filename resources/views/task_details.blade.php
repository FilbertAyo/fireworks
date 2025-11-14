@extends('layouts.front')

@section('title', 'Booking Details | KENSEEP Executive Fireworks')

@section('content')
@php
    $eventDate = $task->event_date ? \Carbon\Carbon::parse($task->event_date) : null;
    $eventTime = $task->event_time ? \Carbon\Carbon::parse($task->event_time) : null;
    $statusColors = [
        'Pending' => 'primary',
        'In Progress' => 'warning',
        'Completed' => 'success',
        'Cancelled' => 'danger'
    ];
    $statusColor = $statusColors[$task->task_status] ?? 'secondary';
@endphp

<!-- Hero Section -->
<section class="section">
    <div class="container d-flex flex-column flex-lg-row align-items-lg-center justify-content-between gap-3">
        <div>
            <span class="subtitle text-uppercase mt-4 d-inline-block">Booking Overview</span>
            <h1 class="mb-3">Your Fireworks Experience</h1>
            <p class="mb-0 text-muted">Review the key details for your event, including products selected and the specialist crew supporting you.</p>
        </div>
        <a href="{{ route('my-dashboard') }}" class="btn btn-white-outline">
            <i class="bi bi-arrow-left me-2"></i> Back to Dashboard
        </a>
    </div>
</section>

<!-- Main Content -->
<section class="section bg-body-tertiary">
    <div class="container">
        <div class="row gy-4">
            <!-- Booking Summary Card -->
            <div class="col-12" data-aos="fade-up">
                <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                    <div class="card-header border-0 py-4 px-4 px-lg-5" style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);">
                        <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
                            <div class="d-flex align-items-center gap-3">
                                <div class="bg-white rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                                    <i class="bi bi-calendar-check text-primary fs-4"></i>
                                </div>
                            <div>
                                    <span class="badge bg-{{ $statusColor }} bg-opacity-10 text-{{ $statusColor }} border border-{{ $statusColor }} border-opacity-25 rounded-pill px-3 py-2 text-uppercase fw-semibold mb-2 d-inline-block">
                                        {{ $task->task_status }}
                                    </span>
                                    <h2 class="h3 fw-bold mb-0 mt-2">{{ $task->task_name }}</h2>
                                </div>
                            </div>
                            <div class="text-md-end">
                                <div class="d-inline-flex flex-column align-items-end gap-2 bg-white rounded-3 p-3 shadow-sm">
                                    <div class="d-flex align-items-center gap-2 text-muted">
                                        <i class="bi bi-calendar-event text-primary"></i>
                                        <span class="fw-semibold">{{ optional($eventDate)->format('l, d M Y') ?? 'Date to be confirmed' }}</span>
                                    </div>
                                    <div class="d-flex align-items-center gap-2 text-muted">
                                        <i class="bi bi-clock text-primary"></i>
                                        <span class="fw-semibold">{{ optional($eventTime)->format('h:i A') ?? ($task->event_time ?: 'Time to be confirmed') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-4 p-lg-5">
                        <div class="row g-4">
                            <!-- Event Contact -->
                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                                <div class="h-100 p-4 bg-light rounded-4 border-0">
                                    <div class="d-flex align-items-center gap-3 mb-4">
                                        <div class="bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                            <i class="bi bi-person-lines-fill text-primary fs-5"></i>
                                        </div>
                                        <h3 class="h5 fw-bold mb-0">Event Contact</h3>
                                    </div>
                                    <div class="d-flex flex-column gap-3">
                                        <div class="d-flex align-items-start gap-3">
                                            <i class="bi bi-telephone-fill text-primary mt-1"></i>
                                            <div>
                                                <small class="text-muted d-block mb-1">Phone Number</small>
                                                <strong class="text-dark">{{ $task->event_phone }}</strong>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-start gap-3">
                                            <i class="bi bi-envelope-fill text-primary mt-1"></i>
                                            <div>
                                                <small class="text-muted d-block mb-1">Email Address</small>
                                                <strong class="text-dark">{{ $task->event_email }}</strong>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-start gap-3">
                                            <i class="bi bi-geo-alt-fill text-primary mt-1"></i>
                                            <div>
                                                <small class="text-muted d-block mb-1">Event Location</small>
                                                <strong class="text-dark">{{ $task->event_address }}</strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Booking Status -->
                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                                <div class="h-100 p-4 bg-light rounded-4 border-0">
                                    <div class="d-flex align-items-center gap-3 mb-4">
                                        <div class="bg-success bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                            <i class="bi bi-info-circle-fill text-success fs-5"></i>
                                        </div>
                                        <h3 class="h5 fw-bold mb-0">Booking Status</h3>
                                    </div>
                                    <div class="d-flex flex-column gap-3">
                                        <div class="d-flex align-items-center justify-content-between p-3 bg-white rounded-3 border-0 shadow-sm">
                                            <div class="d-flex align-items-center gap-3">
                                                <i class="bi bi-credit-card-2-front-fill text-primary fs-5"></i>
                                                <div>
                                                    <small class="text-muted d-block mb-1">Payment Status</small>
                                                    <strong class="text-dark">{{ ucfirst($task->payment_status) }}</strong>
                                                </div>
                                            </div>
                                            <span class="badge rounded-pill px-3 py-2 {{ $task->payment_status === 'Paid' ? 'bg-success bg-opacity-10 text-success border border-success border-opacity-25' : 'bg-warning bg-opacity-10 text-warning border border-warning border-opacity-25' }}">
                                                <i class="bi bi-{{ $task->payment_status === 'Paid' ? 'check-circle' : 'clock' }} me-1"></i>
                                        {{ ucfirst($task->payment_status) }}
                                    </span>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between p-3 bg-white rounded-3 border-0 shadow-sm">
                                            <div class="d-flex align-items-center gap-3">
                                                <i class="bi bi-people-fill text-primary fs-5"></i>
                                                <div>
                                                    <small class="text-muted d-block mb-1">Expert Crew</small>
                                                    <strong class="text-dark">{{ $assignedUsers->count() }} Member(s)</strong>
                                                </div>
                                            </div>
                                    @if ($assignedUsers->isEmpty())
                                                <span class="badge bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25 rounded-pill px-3 py-2">
                                                    <i class="bi bi-x-circle me-1"></i>Not Assigned
                                                </span>
                                    @else
                                                <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25 rounded-pill px-3 py-2">
                                                    <i class="bi bi-check-circle me-1"></i>Assigned
                                                </span>
                                    @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Briefing Notes -->
                            <div class="col-12" data-aos="fade-up" data-aos-delay="300">
                                <div class="p-4 bg-gradient rounded-4 border-0" style="background: linear-gradient(135deg, #f5f7fa 0%, #e9ecef 100%);">
                                    <div class="d-flex align-items-center gap-3 mb-3">
                                        <div class="bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                            <i class="bi bi-file-text-fill text-primary fs-5"></i>
                                        </div>
                                        <h3 class="h5 fw-bold mb-0">Briefing Notes</h3>
                                    </div>
                                    <div class="p-3 bg-white rounded-3 border-0 shadow-sm">
                                        <p class="mb-0 text-dark lh-lg">{{ $task->task_description ?: 'No additional notes provided.' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Selected Fireworks -->
            <div class="col-12" data-aos="fade-up" data-aos-delay="400">
                <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                    <div class="card-header border-0 py-4 px-4 px-lg-5 bg-white">
                        <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
                            <div class="d-flex align-items-center gap-3">
                                <div class="bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                    <i class="bi bi-stars text-primary fs-5"></i>
                                </div>
                                <div>
                                    <h3 class="h4 fw-bold mb-1">Selected Fireworks</h3>
                                    <p class="text-muted mb-0 small">Products chosen for your event</p>
                                </div>
                            </div>
                            <span class="badge bg-primary bg-opacity-10 text-primary border border-primary border-opacity-25 rounded-pill px-4 py-2 fs-6">
                                <i class="bi bi-box-seam me-2"></i>{{ $products->count() }} Item(s)
                            </span>
                        </div>
                    </div>
                    <div class="card-body p-4 p-lg-5">
                        @if($products->isEmpty())
                            <div class="text-center py-5">
                                <div class="mb-4">
                                    <i class="bi bi-inbox text-muted" style="font-size: 4rem; opacity: 0.3;"></i>
                                </div>
                                <h4 class="fw-semibold text-muted mb-2">No Products Selected</h4>
                                <p class="text-muted mb-0">No products have been selected for this booking yet.</p>
                            </div>
                        @else
                            <div class="row g-4">
                                @foreach ($products as $index => $product)
                                    <div class="col-sm-6 col-lg-3" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                                        <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden position-relative" style="transition: transform 0.3s ease, box-shadow 0.3s ease;">
                                            <div class="position-relative overflow-hidden" style="height: 200px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                                                <img src="{{ asset($product->product_image) }}"
                                                     class="card-img-top w-100 h-100"
                                                     alt="{{ $product->product_name }}"
                                                     style="object-fit: cover; transition: transform 0.3s ease;">
                                                <div class="position-absolute top-0 end-0 m-2">
                                                    <span class="badge bg-white bg-opacity-90 text-dark rounded-pill px-3 py-1">
                                                        <i class="bi bi-box-seam me-1"></i>{{ $product->product_quantity }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="card-body p-3">
                                                <h5 class="h6 fw-bold mb-2 text-dark">{{ $product->product_name }}</h5>
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <small class="text-muted">Price</small>
                                                    <span class="text-primary fw-bold">TZS {{ number_format($product->product_price) }}/=</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Expert Crew -->
            <div class="col-12" data-aos="fade-up" data-aos-delay="500">
                <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                    <div class="card-header border-0 py-4 px-4 px-lg-5 bg-white">
                        <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
                            <div class="d-flex align-items-center gap-3">
                                <div class="bg-success bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                    <i class="bi bi-people-fill text-success fs-5"></i>
                                </div>
                                <div>
                                    <h3 class="h4 fw-bold mb-1">Expert Crew</h3>
                                    <p class="text-muted mb-0 small">Certified technicians who will oversee your show</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-4 p-lg-5">
                        @if($assignedUsers->isEmpty())
                            <div class="text-center py-5">
                                <div class="mb-4">
                                    <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                                        <i class="bi bi-hourglass-split text-warning" style="font-size: 2.5rem;"></i>
                                    </div>
                                </div>
                                <h4 class="fw-semibold mb-2">Crew Assignment in Progress</h4>
                                <p class="text-muted mb-0">We're assembling your specialist team. We'll notify you once your crew is confirmed.</p>
                            </div>
                        @else
                            <div class="row g-4">
                                @foreach ($assignedUsers as $index => $user)
                                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                                        <div class="card h-100 border-0 shadow-sm rounded-4 text-center p-4 position-relative overflow-hidden" style="transition: transform 0.3s ease, box-shadow 0.3s ease;">
                                            <div class="position-absolute top-0 start-0 w-100" style="height: 4px; background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);"></div>
                                            <div class="position-relative mb-3">
                                                <div class="position-relative d-inline-block">
                                                    <img src="{{ asset('assets/images/profile.jpeg') }}"
                                                         alt="{{ $user->name }}"
                                                         class="rounded-circle mx-auto"
                                                         style="width: 100px; height: 100px; object-fit: cover; border: 4px solid #f0f0f0; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
                                                    <div class="position-absolute bottom-0 end-0 bg-success rounded-circle border border-white border-3" style="width: 20px; height: 20px;"></div>
                                                </div>
                                            </div>
                                            <h4 class="h5 fw-bold mb-2 text-dark">{{ $user->name }}</h4>
                                            <div class="d-flex flex-column gap-2">
                                                <div class="d-flex align-items-center justify-content-center gap-2 text-muted">
                                                    <i class="bi bi-telephone-fill text-primary"></i>
                                                    <span class="small">{{ $user->phone }}</span>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-center gap-2 text-muted">
                                                    <i class="bi bi-envelope-fill text-primary"></i>
                                                    <span class="small">{{ $user->email }}</span>
                                                </div>
                                            </div>
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

@push('styles')
<style>
    .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.15) !important;
    }

    .card img {
        transition: transform 0.3s ease;
    }

    .card:hover img {
        transform: scale(1.05);
    }

    @media (max-width: 768px) {
        .display-5 {
            font-size: 2rem;
        }
    }
</style>
@endpush
@endsection
