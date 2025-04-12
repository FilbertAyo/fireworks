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

        @if ($products->count() > 0)
            @foreach ($products as $product)
                <div class="d-flex align-items-center justify-content-between mb-3 border-bottom pb-2">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset($product->image_url) }}" alt="" class="me-3 rounded" style="width: 50px; height: 50px;">
                        <div>
                            <h6 class="mb-1">{{ $product->product_name }}</h6>
                            <small class="text-muted">TZS {{ number_format($product->price) }}</small>
                        </div>
                    </div>

                    <!-- Delete button (X) -->
                    <a href="{{ route('cart.remove', ['id' => $product->id]) }}" class="text-muted">
                        <i class="fa fa-times"></i> <!-- X Icon -->
                    </a>
                </div>
            @endforeach

            @php
                $message = 'Hello Kenseep, I would like to buy the following products: ';
                foreach ($products as $product) {
                    $message .= $product->product_name . ' (TZS ' . number_format($product->price) . '/=' . ') ; ';
                }
                $whatsappNumber = '255629184849';
                $whatsappLink = "https://wa.me/{$whatsappNumber}?text=" . urlencode($message);
            @endphp

            <div class="d-flex align-items-center justify-content-between mb-3" style="gap: 5px;">
                <a href="{{ route('book') }}" class="btn btn-primary w-100">Proceed to Book</a>
                <a href="{{ $whatsappLink }}" target="_blank" class="btn btn-success w-100">
                   <span class="me-1"> Buy via</span> <i class="bi bi-whatsapp"></i>
                </a>
            </div>
            {{-- Clear Cart --}}
            <a href="{{ route('cart.clear') }}" class="btn btn-outline-danger w-100">Clear Cart</a>
        @else
            <p class="text-danger text-center">Your cart is empty.</p>
        @endif
    </div>
</div>
