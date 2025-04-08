<x-app-layout>


    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">

        @include('layouts.aside')

        <div class="body-wrapper">
            <!--  Header Start -->
            @include('layouts.navigation')
            <!--  Header End -->
            <div class="m-3">

                <div class="row">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="card-title fw-semibold ">List of Fireworks</h5>

                            <div class="col-md-6">
                                <form action="{{ route('products.list') }}" method="GET" class="d-flex">
                                    <input type="text" name="search" value="{{ request()->input('search') }}" class="form-control" placeholder="Search Products">
                                    <button type="submit" class="btn btn-primary ms-2">Search</button>
                                </form>
                            </div>
                    </div>

                    <div class="col-lg-12 d-flex align-items-stretch">
                        <div class="card w-100 p-3">

                                <form method="GET" action="{{ route('book_create') }}">
                                    @csrf
                                    <div class="row col-12">
                                        @forelse ($products as $product)
                                            <div class="col-lg-2 col-md-3 mb-3">
                                                <div class="property-item rounded overflow-hidden bg-light">
                                                    <div class="position-relative overflow-hidden">
                                                        <a>
                                                            <img class="img-fluid" src="{{ asset($product->image_url) }}">
                                                        </a>

                                                    </div>
                                                    <div class="p-2 pb-0">
                                                        <h6 class="text-primary mb-1">TZS {{ number_format($product->price) }}</h6>
                                                        <a class="d-block h6 mb-2" href="">{{ $product->product_name }}</a>

                                                    </div>
                                                    <div class="d-flex border-top">
                                                        <small class="flex-fill text-center border-end text-danger">{{ $product->duration }}'s</small>
                                                        <small class="flex-fill text-center border-end">{{ $product->category }}</small>
                                                        <small class="flex-fill text-center py-2">
                                                            <input type="checkbox"
                                                                class="form-check-input" id="product{{ $product->id }}"
                                                                name="products[]" value="{{ $product->id }}">
                                                            <label class="form-check-label"
                                                                for="product{{ $product->id }}">Select</label></small>
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
                                        <button type="submit" class="badge bg-primary mt-4">Proceed to Book</button>
                                    </div>
                                </form>

                            <div class="d-flex justify-content-between mt-3">
                                <div class="align-self-center">
                                    <p>Showing {{ $products->firstItem() }} to {{ $products->lastItem() }} of
                                        {{ $products->total() }} products</p>
                                </div>
                                <div class="align-self-center">
                                    {{ $products->links('vendor.pagination.bootstrap-4') }}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>



    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>



</x-app-layout>
