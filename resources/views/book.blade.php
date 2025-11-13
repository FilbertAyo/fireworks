@extends('layouts.front')

@section('title', 'Book an Event | KENSEEP Executive Fireworks')

@section('content')
<section class="section">
    <div class="container">
        <span class="subtitle text-uppercase mt-4 d-inline-block">Bookings</span>
        <h1 class="mb-3">Plan Your Fireworks Experience</h1>
        <p class="mb-0">Review your selected pyrotechnics and share your event details so our specialists can craft a flawless delivery.</p>
    </div>
</section>

<section class="section bg-body-tertiary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-11">
                <div class="card border shadow-none">
                    <div class="card-body p-4 p-lg-5">
                        <form method="POST" action="{{ route('task.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="d-flex flex-column flex-lg-row align-items-lg-center justify-content-between gap-3 mb-4">
                                <h3 class="mb-0">Selected Products</h3>
                                @if ($selectedProducts->isNotEmpty())
                                    <span class="badge bg-dark-subtle text-dark fw-semibold px-3 py-2">
                                        {{ $selectedProducts->count() }} item(s) ready for booking
                                    </span>
                                @endif
                            </div>

                            @if ($selectedProducts->isEmpty())
                                <div class="alert alert-info d-flex flex-column flex-md-row align-items-md-center justify-content-between p-4 rounded-4">
                                    <div class="d-flex align-items-start gap-3">
                                        <span class="badge bg-primary-subtle text-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 42px; height: 42px;">
                                            <i class="bi bi-stars"></i>
                                        </span>
                                        <div>
                                            <h5 class="mb-1">No products selected yet</h5>
                                            <p class="mb-0">Browse our fireworks catalogue to build the perfect show package for your event.</p>
                                        </div>
                                    </div>
                                    <a href="{{ url('/product_list') }}" class="btn btn-primary mt-3 mt-md-0">
                                        Explore Fireworks
                                    </a>
                                </div>
                            @else
                                <div class="row g-4 mt-1">
                                    @foreach ($selectedProducts as $product)
                                        <div class="col-sm-6 col-lg-4 col-xl-3">
                                            <div class="card h-100 border-0 shadow-sm rounded-4">
                                                <div class="position-relative">
                                                    <button type="button"
                                                            class="btn btn-white-outline position-absolute top-0 end-0 m-3 rounded-circle"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#productModal{{ $product->id }}">
                                                        <i class="bi bi-info-lg"></i>
                                                    </button>
                                                    <img class="card-img-top rounded-top-4" src="{{ asset($product->image_url) }}" alt="{{ $product->product_name }}">
                                                </div>
                                                <div class="card-body">
                                                    <h5 class="text-primary fw-bold mb-2" id="price{{ $product->id }}" data-base-price="{{ $product->price }}">
                                                        TZS {{ number_format($product->price) }}/=
                                                    </h5>
                                                    <h6 class="mb-3">{{ $product->product_name }}</h6>
                                                    <div class="d-flex align-items-center bg-body-tertiary rounded-pill px-2 py-1 gap-2 flex-nowrap">
                                                        <button type="button" class="btn btn-sm btn-white-outline flex-shrink-0" onclick="updateQuantity('minus', {{ $product->id }})">
                                                            <i class="bi bi-dash"></i>
                                                        </button>
                                                        <input type="number" class="form-control text-center border-0 bg-transparent flex-grow-1 flex-shrink-0"
                                                               style="max-width: 60px;"
                                                               id="quantityInput{{ $product->id }}" name="product_quantity[]" value="1" min="1" readonly>
                                                        <button type="button" class="btn btn-sm btn-white-outline flex-shrink-0" onclick="updateQuantity('plus', {{ $product->id }})">
                                                            <i class="bi bi-plus"></i>
                                                        </button>
                                                    </div>
                                                </div>

                                                <input type="hidden" name="product_id[]" value="{{ $product->id }}">
                                                <input type="hidden" name="product_image[]" value="{{ $product->image_url }}">
                                                <input type="hidden" name="product_name[]" value="{{ $product->product_name }}">
                                                <input type="hidden" name="product_price[]" value="{{ $product->price }}" id="hiddenPrice{{ $product->id }}">
                                            </div>
                                        </div>

                                        <div class="modal fade" id="productModal{{ $product->id }}" tabindex="-1"
                                             aria-labelledby="productModalLabel{{ $product->id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                                <div class="modal-content rounded-4">
                                                    <div class="modal-header border-0">
                                                        <h5 class="modal-title fw-bold" id="productModalLabel{{ $product->id }}">
                                                            {{ $product->product_name }}
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <img class="img-fluid rounded-4 mb-4" src="{{ asset($product->image_url) }}" alt="{{ $product->product_name }}">
                                                        <div class="row g-4">
                                                            <div class="col-md-6">
                                                                <p class="mb-2"><strong>Price:</strong> TZS {{ number_format($product->price) }}</p>
                                                                <p class="mb-2"><strong>Category:</strong> {{ $product->category }}</p>
                                                                <p class="mb-0"><strong>Duration:</strong> {{ $product->duration }}'s</p>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <p class="mb-2"><strong>Product Status:</strong> {{ $product->product_status }}</p>
                                                                <p class="mb-0"><strong>Video Preview:</strong>
                                                                    <a href="{{ $product->video_url }}" target="_blank" rel="noopener">
                                                                        Watch demo
                                                                    </a>
                                                                </p>
                                                            </div>
                                                            <div class="col-12">
                                                                <p class="mb-0"><strong>Description:</strong> {{ $product->product_description }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif

                            @if ($selectedProducts->isNotEmpty())
                                <hr class="my-5">
                                <div class="d-flex flex-column flex-lg-row align-items-lg-center justify-content-between gap-3 mb-4">
                                    <h3 class="mb-0">Event Details</h3>
                                    <p class="text-muted mb-0">Tell us where and when to make the sky shine.</p>
                                </div>

                                <div class="row g-4">
                                    <div class="col-12">
                                        <label for="task_name" class="form-label fw-semibold">Event Name / Venue</label>
                                        <input type="text" class="form-control" id="task_name" name="task_name" placeholder="e.g. Mwenge Wedding Celebration" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="event_date" class="form-label fw-semibold">Event Date</label>
                                        <input type="date" class="form-control" id="event_date" name="event_date" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="event_time" class="form-label fw-semibold">Event Time</label>
                                        <input type="time" class="form-control" id="event_time" name="event_time" required>
                                    </div>
                                    <div class="col-12">
                                        <label for="event_address" class="form-label fw-semibold">Event Address</label>
                                        <input type="text" class="form-control" id="event_address" name="event_address" placeholder="Location for the fireworks display" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="contact_phone" class="form-label fw-semibold">Primary Contact Phone</label>
                                        <input type="tel" class="form-control" id="contact_phone" name="event_phone" value="{{ Auth::user()->phone }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="contact_person" class="form-label fw-semibold">Contact Email</label>
                                        <input type="email" class="form-control" id="contact_person" name="event_email" value="{{ Auth::user()->email }}" required>
                                    </div>
                                    <div class="col-12">
                                        <label for="task_description" class="form-label fw-semibold">Additional Notes</label>
                                        <textarea class="form-control" id="task_description" name="task_description" rows="3" placeholder="Share timing cues, special requirements, or inspiration for your show."></textarea>
                                    </div>
                                </div>

                                <input type="hidden" name="task_status" value="Pending">
                                <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">

                                <div class="d-flex flex-column flex-lg-row align-items-lg-center justify-content-between gap-3 mt-4">
                                    <p class="mb-0 text-muted">Our team will reach out within 24 hours to confirm logistics and finalize your booking.</p>
                                    <button type="submit" class="btn btn-primary px-4 py-2">Confirm Booking</button>
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    function updateQuantity(action, productId) {
        const quantityInput = document.getElementById(`quantityInput${productId}`);
        const priceElement = document.getElementById(`price${productId}`);
        const hiddenPriceInput = document.getElementById(`hiddenPrice${productId}`);
        const basePrice = parseFloat(priceElement.dataset.basePrice);
        let quantity = parseInt(quantityInput.value, 10);

        if (action === 'plus') {
            quantity += 1;
        } else if (action === 'minus' && quantity > 1) {
            quantity -= 1;
        }

        quantityInput.value = quantity;

        const newPrice = basePrice * quantity;
        priceElement.textContent = `TZS ${newPrice.toLocaleString()}/=`;
        hiddenPriceInput.value = newPrice;
    }
</script>
@endpush
