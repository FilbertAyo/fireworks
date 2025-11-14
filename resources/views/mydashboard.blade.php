@extends('layouts.front')

@section('title', 'My Dashboard | KENSEEP Executive Fireworks')

@section('content')
<section class="section">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-8">
                <span class="subtitle text-uppercase mt-4 d-inline-block">Customer Portal</span>
                <h1 class="mb-3">Manage Your Fireworks Bookings</h1>
                <p class="mb-0 text-muted">Track event progress, review assigned crew, and explore additional pyrotechnic options designed for you.</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="{{ url('/product_list') }}" class="btn btn-primary">
                    <i class="bi bi-stars me-2"></i>Book Another Event
                </a>
            </div>
        </div>
    </div>
</section>

<section class="section bg-body-tertiary">
    <div class="container">
        <div class="card border shadow-none">
            <div class="card-body p-4 p-lg-5">
                <ul class="nav nav-pills gap-2 mb-4" id="dashboardTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="bookings-tab" data-bs-toggle="tab" data-bs-target="#bookings" type="button" role="tab">
                            My Bookings
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="products-tab" data-bs-toggle="tab" data-bs-target="#products" type="button" role="tab">
                            Saved Products
                        </button>
                    </li>
                </ul>

                <div class="tab-content" id="dashboardTabsContent">
                    <div class="tab-pane fade show active" id="bookings" role="tabpanel">
                        @if($tasks->isEmpty())
                            <div class="text-center py-5">
                                <div class="icon mb-3">
                                    <span class="badge bg-primary-subtle text-primary rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                        <i class="bi bi-calendar2-week"></i>
                                    </span>
                                </div>
                                <h3 class="fw-semibold">You haven’t booked a show yet</h3>
                                <p class="text-muted mb-4">Ready to light up the night? Browse our curated collection of fireworks experiences and reserve yours.</p>
                                <a href="{{ url('/product_list') }}" class="btn btn-primary">
                                    Discover Fireworks Packages
                                </a>
                            </div>
                        @else
                            <div class="table-responsive">
                                <table class="table table-bordered align-middle">
                                    <thead class="table-light">
                                    <tr>
                                        <th scope="col" class="text-uppercase small text-muted">#</th>
                                        <th scope="col" class="text-uppercase small text-muted">Event</th>
                                        <th scope="col" class="text-uppercase small text-muted">Status</th>
                                        <th scope="col" class="text-uppercase small text-muted text-center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($tasks as $index => $task)
                                        <tr>
                                            <td class="fw-semibold">{{ $index + 1 }}</td>
                                            <td>
                                                <p class="mb-1 fw-semibold">{{ $task->task_name }}</p>
                                                <span class="text-muted small">Booked on {{ optional($task->created_at)->format('M d, Y') }}</span>
                                            </td>
                                            <td>
                                                <span class="badge rounded-pill {{ $task->task_status === 'Completed' ? 'bg-success-subtle text-success' : ($task->task_status === 'In Progress' ? 'bg-warning-subtle text-warning' : 'bg-primary-subtle text-primary') }}">
                                                    {{ $task->task_status }}
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('task.showTask', $task->id) }}" class="btn btn-white-outline btn-sm">
                                                    <i class="bi bi-eye me-1"></i> View
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>

                    <div class="tab-pane fade" id="products" role="tabpanel">
                        <div class="text-center py-5">
                            <div class="icon mb-3">
                                <span class="badge bg-dark-subtle text-dark rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                    <i class="bi bi-box-seam"></i>
                                </span>
                            </div>
                            <h3 class="fw-semibold">Saved products coming soon</h3>
                            <p class="text-muted mb-0">We’re building a personal wishlist so you can compare packages and plan ahead. Stay tuned!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">
@endpush

@push('scripts')
<script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        @if (session('success'))
            swal("Success!", "{{ session('success') }}", "success");
        @elseif (session('error'))
            swal("Oops!", "{{ session('error') }}", "error");
        @endif
    });
</script>
@endpush
