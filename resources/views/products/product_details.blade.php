@extends('layouts.front')

@section('title', $product->product_name . ' | Fireworks Detail')

@section('content')
<section class="section">
    <div class="container d-flex flex-column flex-lg-row align-items-lg-center justify-content-between gap-3">
        <div>
            <span class="subtitle text-uppercase mt-4 d-inline-block">Fireworks Detail</span>
            <h1 class="mb-3">{{ $product->product_name }}</h1>
            <p class="mb-0 text-muted">Dive into the choreography, effects, and design inspiration behind this signature display element.</p>
        </div>
        <a href="{{ url('/product_list') }}" class="btn btn-white-outline">
            <i class="bi bi-arrow-left me-2"></i>Back to catalogue
        </a>
    </div>
</section>

<section class="section bg-body-tertiary">
    <div class="container">
        <div class="card border shadow-none overflow-hidden">
            <div class="row g-0 align-items-stretch p-3">
                <div class="col-lg-5">
                    <div class="h-100 position-relative">
                        <img class="img-fluid w-100 h-100 object-fit-cover" src="{{ asset($product->image_url) }}" alt="{{ $product->product_name }}">
                        @if($product->video_url)
                            <a href="{{ $product->video_url }}" target="_blank" rel="noopener"
                               class="btn btn-primary btn-sm rounded-pill position-absolute top-0 start-0 m-3 d-inline-flex align-items-center gap-1">
                                <i class="bi bi-play-circle"></i><span>Watch Preview</span>
                            </a>
                        @endif
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="card-body p-4 p-lg-5 h-100 d-flex flex-column gap-4">
                        <div>
                            <span class="badge bg-primary-subtle text-primary rounded-pill px-3 py-2 mb-3 text-uppercase">{{ $product->category }}</span>
                            <h2 class="h3 fw-bold mb-2">{{ $product->product_name }}</h2>
                            <p class="text-primary fw-semibold fs-4 mb-0">TZS {{ number_format($product->price) }}</p>
                        </div>

                        <div class="row g-3">
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center gap-3 p-3 rounded-4 bg-body-tertiary">
                                    <span class="icon rounded-circle bg-primary-subtle text-primary d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                                        <i class="bi bi-clock-history"></i>
                                    </span>
                                    <div>
                                        <h6 class="mb-0 text-uppercase text-muted small">Duration</h6>
                                        <p class="fw-semibold mb-0">{{ $product->duration }} seconds</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center gap-3 p-3 rounded-4 bg-body-tertiary">
                                    <span class="icon rounded-circle bg-primary-subtle text-primary d-inline-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                                        <i class="bi bi-box-seam"></i>
                                    </span>
                                    <div>
                                        <h6 class="mb-0 text-uppercase text-muted small">Pieces</h6>
                                        <p class="fw-semibold mb-0">{{ $product->piece }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <h5 class="fw-semibold mb-2">Show Highlights</h5>
                            <p class="mb-0">{{ $product->product_description }}</p>
                        </div>

                        <div class="mt-auto">
                            <div class="d-flex flex-column flex-md-row align-items-md-center gap-3">
                                <a href="{{ url('/product_list') }}" class="btn btn-primary px-4 py-2">
                                    <i class="bi bi-plus-circle me-2"></i>Add to booking shortlist
                                </a>
                                <a href="{{ route('book') }}" class="btn btn-white-outline px-4 py-2">
                                    <i class="bi bi-stars me-2"></i>Plan your event
                                </a>
                            </div>
                            <p class="text-muted small mt-3 mb-0">Tip: Combine this effect with synchronized music and aerial shells for a breathtaking finale sequence.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
