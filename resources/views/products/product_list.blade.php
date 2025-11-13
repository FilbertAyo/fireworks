@extends('layouts.front')

@section('title', 'Fireworks Catalogue | KENSEEP Executive Fireworks')

@section('content')
<section class="section">
    <div class="container">
        <span class="subtitle text-uppercase mt-4 d-inline-block">Catalogue</span>
        <h1 class="mb-3">Explore Our Signature Fireworks</h1>
        <p class="mb-0 text-muted">Select the effects you love, then proceed to booking so our crew can choreograph the perfect sky story.</p>
    </div>
</section>

<section class="section bg-body-tertiary">
    <div class="container">
        <div class="card border shadow-none">
            <div class="card-body p-4 p-lg-5">
                <form action="{{ url('/product_list') }}" method="GET" class="mb-4">
                    <div class="row g-3 align-items-center">
                        <div class="col-lg-9">
                          <input type="text"
                                   class="form-control form-control-lg border-0 bg-body-tertiary"
                                   id="search"
                                   name="search"
                                   value="{{ request()->input('search') }}"
                                   placeholder="Search by name or category">
                        </div>
                        <div class="col-lg-3">
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="bi bi-search me-2"></i>Find Effects
                            </button>
                        </div>
                    </div>
                </form>

                <form method="GET" action="{{ route('book') }}">
                    <div class="row g-4">
                        @forelse ($products as $product)
                            <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
                                <div class="card h-100 border-0 shadow-sm rounded-4">
                                    <div class="position-relative">
                                        <a href="{{ route('product.showProduct', $product->id) }}">
                                            <img class="card-img-top rounded-top-4 object-fit-cover" src="{{ asset($product->image_url) }}" alt="{{ $product->product_name }}" style="height: 220px;">
                                        </a>
                                        @if($product->video_url)
                                            <a href="{{ $product->video_url }}" target="_blank" rel="noopener"
                                               class="btn btn-primary btn-sm rounded-circle position-absolute top-0 start-0 m-3 d-inline-flex align-items-center justify-content-center"
                                               style="width: 38px; height: 38px;">
                                                <i class="bi bi-play-circle"></i>
                                                <span class="visually-hidden">Preview</span>
                                            </a>
                                        @endif
                                    </div>
                                    <div class="card-body d-flex flex-column gap-3">
                                        <div>
                                            <h5 class="fw-bold text-primary mb-1">TZS {{ number_format($product->price) }}</h5>
                                            <h6 class="mb-0">{{ $product->product_name }}</h6>
                                            <p class="text-muted small mb-0"><i class="bi bi-layers me-1"></i>{{ $product->category }}</p>
                                        </div>
                                        <div class="d-flex justify-content-between text-muted small">
                                            <span><i class="bi bi-clock-history me-1 text-primary"></i>{{ $product->duration }}'s</span>
                                            <span><i class="bi bi-box-seam me-1 text-primary"></i>{{ $product->piece }} pieces</span>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between border-top pt-3 mt-auto">
                                            <label class="form-check-label d-flex align-items-center gap-2 mb-0" for="product{{ $product->id }}">
                                                <input type="checkbox"
                                                       class="form-check-input"
                                                       id="product{{ $product->id }}"
                                                       name="products[]"
                                                       value="{{ $product->id }}"
                                                       aria-label="Select {{ $product->product_name }} for booking">
                                                <i class="bi bi-plus-circle fs-5 text-primary"></i>
                                                <span class="visually-hidden">Select for booking</span>
                                            </label>
                                            <a href="{{ route('product.showProduct', $product->id) }}"
                                               class="btn btn-white-outline btn-sm rounded-circle d-inline-flex align-items-center justify-content-center"
                                               style="width: 36px; height: 36px;"
                                               aria-label="View details for {{ $product->product_name }}">
                                                <i class="bi bi-arrow-up-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12">
                                <div class="alert alert-info text-center rounded-4 mb-0">
                                    We couldn’t find fireworks matching your search. Try another keyword or browse all packages.
                                </div>
                            </div>
                        @endforelse
                    </div>

                    @if ($products->count())
                        <div class="d-flex flex-column flex-lg-row align-items-lg-center justify-content-between gap-3 mt-5">
                            <p class="mb-0 text-muted">Showing {{ $products->firstItem() }} to {{ $products->lastItem() }} of {{ $products->total() }} fireworks.</p>
                            {{ $products->links('vendor.pagination.bootstrap-4') }}
                        </div>

                        <div class="text-center mt-4">
                            @auth
                                <button type="submit" class="btn btn-primary px-4 py-2">Proceed to Booking</button>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-primary px-4 py-2">Proceed to Booking</a>
                            @endauth
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
