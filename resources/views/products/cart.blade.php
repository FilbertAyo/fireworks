<div class="offcanvas offcanvas-end" tabindex="-1" id="cartOffcanvas" aria-labelledby="cartOffcanvasLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="cartOffcanvasLabel"><i class="fa fa-shopping-cart me-2"></i>Your Cart</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        @php
            $cart = session('cart', []);
            $products = \App\Models\Product::whereIn('id', $cart)->get();
        @endphp

        @if($products->count() > 0)
            @foreach ($products as $product)
                <div class="d-flex align-items-center mb-3 border-bottom pb-2">
                    <img src="{{ asset($product->image_url) }}" alt="" class="me-3 rounded" style="width: 50px; height: 50px;">
                    <div>
                        <h6 class="mb-1">{{ $product->product_name }}</h6>
                        <small class="text-muted">TZS {{ number_format($product->price) }}</small>
                    </div>
                </div>
            @endforeach

            <a href="{{ route('book') }}" class="btn btn-primary w-100 mt-3">Proceed to Book</a>

            <a href="{{ route('cart.clear') }}" class="btn btn-outline-danger w-100 mt-2">Clear Cart</a>
        @else
            <p class="text-danger text-center">Your cart is empty.</p>
        @endif
    </div>
</div>
