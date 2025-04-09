@extends('layouts.front-app')

@section('content')


    <section class="section main-banner " id="top" data-section="section1" style="height: 20vh; background-image: url('{{ asset('assets/images/kenseep.jpg') }}');">

        <div class="video-overlay header-text text-center">
            <div class="container">
                <div class="row">
                        <div class="caption">
                            <h2 style="font-size: 40px;">Fireworks List</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="container-fluid bg-primary" style="padding: 20px;">
        <div class="container">
            <form action="{{ url('/product_list') }}" method="GET">
            <div class="row g-2">
                <div class="col-md-10">
                    <div class="row g-2">
                        <div class="col-md-12">
                            <input type="text" class="form-control border-0 py-2" name="search" value="{{ request()->input('search') }}" placeholder="Search Fireworks or category">
                        </div>

                    </div>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-dark border-0 w-100 py-2">Search</button>
                </div>
            </div>
        </form>
        </div>
    </div>


    <div class="container-xxl py-5">

            <div class="row g-4">

                    <div class="row">
                        @forelse ($products as $product)
                        <div class="col-6 col-md-4 col-lg-3 mb-3">
                                <div class="property-item rounded overflow-hidden">
                                    <div class="position-relative overflow-hidden">
                                        <a href="{{ route('product.showProduct',$product->id) }}">
                                            <img class="img-fluid" src="{{ asset($product->image_url) }}"
                                                alt="">
                                        </a>
                                        <a href="{{ $product->video_url }}" target="_blank"
                                            class="bg-primary text-white position-absolute start-0 top-0 m-2 px-2"><i class="bi bi-play-circle"></i></a>
                                    </div>
                                    <div class="py-4 px-2 pb-0 mb-2">
                                        <h6 class="text-primary mb-1">TZS {{ number_format($product->price) }}</h6>
                                        <h6 class="d-block h6" href="">{{ $product->product_name }}</h6>
                                        <small class="flex-fill"><i
                                            class="fa fa-layer-group text-primary me-2"></i>{{ $product->category }}</small>
                                    </div>
                                    <div class="d-flex border-top">
                                        <small class="flex-fill text-center border-end py-2"><i
                                                class="fa fa-clock text-primary me-2"></i>{{ $product->duration }}'s</small>
                                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-box text-primary me-2"></i>{{ $product->piece }} pieces</small>

                                                <small class="flex-fill text-center">
                                                    <form method="POST" action="{{ route('cart.add') }}">
                                                        @csrf
                                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                        <button type="submit" class="btn text-primary"><i class="fa fa-cart-plus"></i></button>
                                                    </form>
                                                </small>

                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="text-center">
                                <h6 class="fw-semibold mb-0 text-danger">No Fireworks found.</h6>
                            </div>
                        @endforelse
                    </div>
                    <div class="text-center">
                        <div class="d-flex justify-content-between mt-3">
                            <div class="align-self-center">
                                <p>Showing {{ $products->firstItem() }} to {{ $products->lastItem() }} of {{ $products->total() }} products</p>
                            </div>
                            <div class="align-self-center">
                                {{ $products->links('vendor.pagination.bootstrap-4') }}
                            </div>
                        </div>

                        @auth
                            <a href="{{ route('book') }}" class="btn btn-primary mt-4">Proceed to Book</a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-primary mt-4">Proceed to Book</a>

                        @endauth
                    </div>


            </div>
    </div>


    @endsection
