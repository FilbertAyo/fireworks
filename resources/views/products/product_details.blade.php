@extends('layouts.front-app')

@section('content')

    <section class="section main-banner " id="top" data-section="section1" style="height: 20vh; background-image: url('{{ asset('assets/images/kenseep.jpg') }}');">

        <div class="video-overlay header-text text-center">
            <div class="container">
                <div class="row">
                        <div class="caption">
                            <h2 style="font-size: 35px;">Fireworks Details</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container-fluid bg-primary" style="padding: 20px;">

    </div>

    <div class="container-xxl mt-3 p-3">
        <div class="row justify-content-center">
            <div class="card border-0 rounded" style="background-color: #F6F6F6;">
                <div class="row g-0 align-items-center">
                    <!-- Product Image -->
                    <div class="col-md-5 py-3">
                        <img class="img-fluid rounded-start" src="{{ asset($product->image_url) }}" alt="Product Image">
                    </div>
                    <!-- Product Details -->
                    <div class="col-md-7">
                        <div class="card-body">
                            <h3 class="card-title text-primary"> {{ $product->product_name }}</h3>
                            <h5 class="text-success"><i class="fas fa-tag"></i> <strong>Price:</strong> <span class="text-success">TZS {{ number_format($product->price  )}}</span></h5>
                            <p><i class="fas fa-layer-group"></i> <strong>Category:</strong> {{ $product->category }}</p>
                            <p><i class="fas fa-video"></i> <strong>Video Preview:</strong>
                                <a href="{{ $product->video_url }}" target="_blank" class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-play-circle"></i> Watch Video
                                </a>
                            </p>
                            <p><i class="fas fa-align-left"></i> <strong>Description:</strong></p>
                            <p>{{ $product->product_description }}</p>
                            <p><i class="fas fa-clock"></i> <strong>Duration:</strong> {{ $product->duration }}'s</p>
                            <div class="d-flex justify-content-start mt-4" style="gap: 5px;">
                                <button type="button" class="btn btn-danger">Buy Now</button>
                                <form method="POST" action="{{ route('cart.add') }}">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <button type="submit" class="btn btn-success "><i class="fas fa-shopping-cart"></i> Add to cart</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    </div>


   @endsection
