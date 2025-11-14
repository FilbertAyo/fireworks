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
                        <div class="col-lg-7">
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
                        <div class="col-lg-2">
                            @if(request()->input('search'))
                                <a href="{{ url('/product_list') }}" class="btn btn-outline-secondary w-100">
                                    <i class="bi bi-x-lg me-2"></i>Clear
                                </a>
                            @endif
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
                                                       class="form-check-input product-checkbox"
                                                       id="product{{ $product->id }}"
                                                       name="products[]"
                                                       value="{{ $product->id }}"
                                                       data-product-id="{{ $product->id }}"
                                                       data-product-name="{{ $product->product_name }}"
                                                       data-product-price="{{ $product->price }}"
                                                       data-product-image="{{ asset($product->image_url) }}"
                                                       data-product-duration="{{ $product->duration }}"
                                                       data-product-piece="{{ $product->piece }}"
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
                    @endif
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Floating Mini Cart -->
<div id="miniCart" class="mini-cart">
    <div class="mini-cart-header" id="miniCartHeader">
        <div class="d-flex align-items-center gap-2">
            <i class="bi bi-cart-check fs-5"></i>
            <span class="fw-semibold">Selected Items</span>
            <span class="badge bg-primary rounded-pill ms-2" id="cartCount">0</span>
        </div>
        <button type="button" class="btn btn-link text-white p-0 border-0" id="toggleCart" aria-label="Toggle cart" style="text-decoration: none;">
            <i class="bi bi-x-lg"></i>
        </button>
    </div>
    <div class="mini-cart-body" id="miniCartBody">
        <div id="cartItems" class="cart-items">
            <div class="text-center text-muted py-5">
                <i class="bi bi-cart-x fs-1 d-block mb-2"></i>
                <p class="mb-0 small">No items selected yet</p>
            </div>
        </div>
        <div class="mini-cart-footer" id="miniCartFooter" style="display: none;">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <span class="fw-semibold">Total:</span>
                <span class="fs-5 fw-bold text-primary" id="cartTotal">TZS 0</span>
            </div>
            <form method="GET" action="{{ route('book') }}" id="cartForm">
                @auth
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="bi bi-arrow-right me-2"></i>Proceed to Booking
                    </button>
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary w-100">
                        <i class="bi bi-arrow-right me-2"></i>Proceed to Booking
                    </a>
                @endauth
            </form>
        </div>
    </div>
</div>

@push('styles')
<style>
    .mini-cart {
        position: fixed;
        bottom: 20px;
        right: 20px;
        width: 380px;
        max-width: calc(100vw - 40px);
        max-height: 600px;
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
        z-index: 1050;
        transform: translateY(calc(100% + 20px));
        opacity: 0;
        visibility: hidden;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        display: flex;
        flex-direction: column;
        overflow: hidden;
    }

    .mini-cart.active {
        transform: translateY(0);
        opacity: 1;
        visibility: visible;
    }

    .mini-cart-header {
        background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%);
        color: white;
        padding: 16px 20px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        cursor: pointer;
        user-select: none;
    }

    .mini-cart-body {
        max-height: 450px;
        overflow-y: auto;
        display: flex;
        flex-direction: column;
        flex: 1;
    }

    .cart-items {
        padding: 16px;
        flex: 1;
        min-height: 100px;
    }

    .cart-item {
        display: flex;
        gap: 12px;
        padding: 12px;
        background: #f8f9fa;
        border-radius: 12px;
        margin-bottom: 12px;
        animation: slideIn 0.3s ease-out;
        align-items: center;
    }

    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateX(-20px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    .cart-item-image {
        width: 60px;
        height: 60px;
        object-fit: cover;
        border-radius: 8px;
        flex-shrink: 0;
    }

    .cart-item-details {
        flex: 1;
        min-width: 0;
    }

    .cart-item-name {
        font-weight: 600;
        font-size: 14px;
        margin-bottom: 4px;
        color: #212529;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .cart-item-price {
        font-size: 13px;
        color: #0d6efd;
        font-weight: 600;
    }

    .cart-item-remove {
        background: none;
        border: none;
        color: #dc3545;
        padding: 4px 8px;
        border-radius: 6px;
        cursor: pointer;
        transition: all 0.2s;
        flex-shrink: 0;
    }

    .cart-item-remove:hover {
        background: #fee;
        transform: scale(1.1);
    }

    .mini-cart-footer {
        padding: 16px 20px;
        border-top: 1px solid #dee2e6;
        background: #fff;
        margin-top: auto;
    }

    .mini-cart.collapsed .mini-cart-body {
        display: none;
    }

    .mini-cart.collapsed .mini-cart-footer {
        display: none;
    }

    /* Scrollbar styling */
    .mini-cart-body::-webkit-scrollbar {
        width: 6px;
    }

    .mini-cart-body::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    .mini-cart-body::-webkit-scrollbar-thumb {
        background: #0d6efd;
        border-radius: 3px;
    }

    .mini-cart-body::-webkit-scrollbar-thumb:hover {
        background: #0a58ca;
    }

    @media (max-width: 768px) {
        .mini-cart {
            width: calc(100vw - 40px);
            bottom: 10px;
            right: 10px;
        }
    }
</style>
@endpush

@push('scripts')
<script>
    (function() {
        const miniCart = document.getElementById('miniCart');
        const cartItems = document.getElementById('cartItems');
        const cartCount = document.getElementById('cartCount');
        const cartTotal = document.getElementById('cartTotal');
        const cartFooter = document.getElementById('miniCartFooter');
        const cartHeader = document.getElementById('miniCartHeader');
        const checkboxes = document.querySelectorAll('.product-checkbox');
        const cartForm = document.getElementById('cartForm');
        const toggleCartBtn = document.getElementById('toggleCart');

        let selectedProducts = new Map();

        // Format number with commas
        function formatNumber(num) {
            return new Intl.NumberFormat('en-TZ').format(num);
        }

        // Save cart to localStorage
        function saveCartToStorage() {
            const cartData = Array.from(selectedProducts.entries()).map(([id, product]) => ({
                id: id,
                product: product
            }));
            localStorage.setItem('fireworkCart', JSON.stringify(cartData));
        }

        // Load cart from localStorage
        function loadCartFromStorage() {
            try {
                const savedCart = localStorage.getItem('fireworkCart');
                if (savedCart) {
                    const cartData = JSON.parse(savedCart);
                    cartData.forEach(({id, product}) => {
                        selectedProducts.set(id, product);
                        const checkbox = document.querySelector(`input[data-product-id="${id}"]`);
                        if (checkbox) {
                            checkbox.checked = true;
                        }
                    });
                    if (selectedProducts.size > 0) {
                        updateCart();
                    }
                }
            } catch (e) {
                console.error('Error loading cart from storage:', e);
            }
        }

        // Clear cart from localStorage
        function clearCartFromStorage() {
            localStorage.removeItem('fireworkCart');
        }

        // Update cart UI
        function updateCart() {
            const count = selectedProducts.size;
            cartCount.textContent = count;

            if (count === 0) {
                cartItems.innerHTML = `
                    <div class="text-center text-muted py-5">
                        <i class="bi bi-cart-x fs-1 d-block mb-2"></i>
                        <p class="mb-0 small">No items selected yet</p>
                    </div>
                `;
                cartFooter.style.display = 'none';
                miniCart.classList.remove('active');
                removeClearCartButton(); // Remove clear button when cart is empty
                clearCartFromStorage(); // Clear storage when cart is empty
            } else {
                let total = 0;
                let html = '';

                selectedProducts.forEach((product, id) => {
                    total += parseFloat(product.price);
                    html += `
                        <div class="cart-item" data-product-id="${id}">
                            <img src="${product.image}" alt="${product.name}" class="cart-item-image">
                            <div class="cart-item-details">
                                <div class="cart-item-name">${product.name}</div>
                                <div class="cart-item-price">TZS ${formatNumber(product.price)}</div>
                            </div>
                            <button type="button" class="cart-item-remove" onclick="removeFromCart(${id})" aria-label="Remove ${product.name}">
                                <i class="bi bi-x-lg"></i>
                            </button>
                        </div>
                    `;
                });

                cartItems.innerHTML = html;
                cartTotal.textContent = `TZS ${formatNumber(total)}`;
                cartFooter.style.display = 'block';
                miniCart.classList.add('active');

                // Add clear cart button if it doesn't exist
                addClearCartButton();
            }

            // Save to localStorage after UI update
            saveCartToStorage();
        }

        // Add to cart
        function addToCart(checkbox) {
            const productId = parseInt(checkbox.dataset.productId);
            const product = {
                id: productId,
                name: checkbox.dataset.productName,
                price: parseFloat(checkbox.dataset.productPrice),
                image: checkbox.dataset.productImage,
                duration: checkbox.dataset.productDuration,
                piece: checkbox.dataset.productPiece
            };

            selectedProducts.set(productId, product);
            checkbox.checked = true;

            // Add animation effect
            const label = checkbox.closest('label');
            label.style.transform = 'scale(1.1)';
            setTimeout(() => {
                label.style.transform = 'scale(1)';
            }, 200);

            updateCart();
        }

        // Remove from cart
        window.removeFromCart = function(productId) {
            const checkbox = document.querySelector(`input[data-product-id="${productId}"]`);
            if (checkbox) {
                checkbox.checked = false;
            }
            selectedProducts.delete(productId);
            updateCart();

            // Animate removal
            const cartItem = document.querySelector(`.cart-item[data-product-id="${productId}"]`);
            if (cartItem) {
                cartItem.style.animation = 'slideOut 0.3s ease-out';
                setTimeout(() => {
                    if (cartItem.parentNode) {
                        cartItem.remove();
                    }
                }, 300);
            }
        };

        // Add slideOut animation
        const style = document.createElement('style');
        style.textContent = `
            @keyframes slideOut {
                to {
                    opacity: 0;
                    transform: translateX(20px);
                }
            }
        `;
        document.head.appendChild(style);

        // Handle checkbox changes
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                const productId = parseInt(this.dataset.productId);

                if (this.checked) {
                    addToCart(this);
                } else {
                    removeFromCart(productId);
                }
            });
        });

        // Toggle cart collapse
        function toggleCartCollapse() {
            miniCart.classList.toggle('collapsed');
            const icon = toggleCartBtn.querySelector('i');
            if (icon) {
                icon.className = miniCart.classList.contains('collapsed')
                    ? 'bi bi-chevron-down'
                    : 'bi bi-x-lg';
            }
        }

        toggleCartBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            toggleCartCollapse();
        });

        // Also allow clicking header to toggle (but not the button itself)
        cartHeader.addEventListener('click', function(e) {
            if (e.target !== toggleCartBtn && !toggleCartBtn.contains(e.target)) {
                toggleCartCollapse();
            }
        });

        // Prevent form submission when clicking cart
        cartForm.addEventListener('submit', function(e) {
            if (selectedProducts.size === 0) {
                e.preventDefault();
                alert('Please select at least one product to proceed.');
                return false;
            }
        });

        // Add clear cart button to cart footer
        function addClearCartButton() {
            const cartFooter = document.getElementById('miniCartFooter');
            if (cartFooter && !document.getElementById('clearCartBtn') && selectedProducts.size > 0) {
                const clearBtn = document.createElement('button');
                clearBtn.type = 'button';
                clearBtn.id = 'clearCartBtn';
                clearBtn.className = 'btn btn-outline-danger w-100 mt-2';
                clearBtn.innerHTML = '<i class="bi bi-trash me-2"></i>Clear Cart';
                clearBtn.onclick = function() {
                    if (confirm('Are you sure you want to clear all selected items?')) {
                        // Clear all checkboxes
                        checkboxes.forEach(checkbox => {
                            checkbox.checked = false;
                        });
                        // Clear cart
                        selectedProducts.clear();
                        updateCart();
                    }
                };
                const form = cartFooter.querySelector('form');
                if (form) {
                    form.parentNode.insertBefore(clearBtn, form.nextSibling);
                }
            }
        }

        // Remove clear cart button
        function removeClearCartButton() {
            const clearBtn = document.getElementById('clearCartBtn');
            if (clearBtn) {
                clearBtn.remove();
            }
        }

        // Update form with selected products on submit
        cartForm.addEventListener('submit', function(e) {
            const productIds = Array.from(selectedProducts.keys());

            // Remove existing hidden inputs to avoid duplicates
            cartForm.querySelectorAll('input[name="products[]"][type="hidden"]').forEach(input => {
                input.remove();
            });

            // Add hidden inputs for each selected product
            productIds.forEach(id => {
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'products[]';
                input.value = id;
                cartForm.appendChild(input);
            });

            // Clear cart from localStorage when proceeding to booking
            clearCartFromStorage();
        });

        // Initialize cart state on page load
        // Wait for DOM to be fully loaded
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', loadCartFromStorage);
        } else {
            loadCartFromStorage();
        }
    })();
</script>
@endpush
@endsection
