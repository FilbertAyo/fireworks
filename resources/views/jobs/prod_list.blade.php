<x-app-layout>

    @php
        $selectedProductIds = $selectedProductIds ?? [];
        $selectedProductSummaries = isset($selectedProductDetails)
            ? $selectedProductDetails->map(fn ($product) => [
                'id' => $product->id,
                'name' => $product->product_name,
                'price' => $product->price,
                'image' => asset($product->image_url),
            ])
            : collect();
    @endphp

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
                        <h5 class="card-title fw-semibold">List of Fireworks</h5>

                        <div class="col-md-6">
                            <form action="{{ route('products.list') }}" method="GET" class="d-flex align-items-center gap-2"
                                id="product-search-form">
                                <input type="text" name="search" value="{{ $search }}" class="form-control"
                                    placeholder="Search products..." id="search-input">
                                <div id="search-hidden-inputs"></div>
                                <button type="submit" class="btn btn-primary">Search</button>
                                <a href="{{ route('products.list') }}" class="btn btn-outline-secondary">Clear</a>
                            </form>
                        </div>
                    </div>

                    <form method="GET" action="{{ route('book_create') }}" class="row g-4" id="booking-form">
                        <div class="col-lg-9">
                            <div class="card w-100 shadow-none border p-3 h-100">
                                <div class="row">
                                    @forelse ($products as $product)
                                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-4">
                                            <div class="property-item rounded overflow-hidden bg-light border">
                                                <div class="position-relative overflow-hidden product-card-thumb">
                                                    <a>
                                                        <img class="img-fluid product-card-img"
                                                            src="{{ asset($product->image_url) }}"
                                                            alt="{{ $product->product_name }}">
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
                                                        <input type="checkbox" class="form-check-input product-selector"
                                                            id="product{{ $product->id }}"
                                                            data-name="{{ $product->product_name }}"
                                                            data-price="{{ $product->price }}"
                                                            data-image="{{ asset($product->image_url) }}"
                                                            value="{{ $product->id }}" @checked(in_array($product->id, $selectedProductIds))>
                                                        <label class="form-check-label"
                                                            for="product{{ $product->id }}">Select</label>
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
                                <div class="d-flex justify-content-between align-items-center mt-3 flex-wrap gap-2">
                                    <div>
                                        <p class="mb-0">Showing {{ $products->firstItem() }} to {{ $products->lastItem() }} of
                                            {{ $products->total() }} products</p>
                                    </div>
                                    <div>
                                        {{ $products->links('vendor.pagination.bootstrap-4') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card shadow-none border h-100">
                                <div class="card-body d-flex flex-column">
                                    <h6 class="fw-semibold">Selected Fireworks</h6>
                                    <p class="text-muted small" id="selection-empty-state">No products selected yet.</p>
                                    <div class="selected-items-list flex-grow-1" id="selected-items-list"></div>
                                    <div class="mt-3 border-top pt-3" id="selection-summary" style="display: none;">
                                        <div class="d-flex justify-content-between mb-2">
                                            <span class="fw-semibold">Items</span>
                                            <span class="fw-semibold" id="selection-count">0</span>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <span class="fw-semibold">Total</span>
                                            <span class="fw-semibold text-primary" id="selection-total">TZS 0</span>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column gap-2 mt-3">
                                        <button type="button" class="btn btn-outline-secondary btn-sm"
                                            id="clear-selection-btn">Clear Selection</button>
                                        <button type="submit" class="btn btn-primary">Proceed to Book</button>
                                    </div>
                                    <div id="booking-hidden-inputs"></div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>



    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>

    <style>
        .product-card-thumb {
            height: 200px;
        }

        .product-card-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .selected-items-list .selected-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.5rem 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .selected-items-list .selected-item:last-child {
            border-bottom: none;
        }

        .selected-item-thumb {
            width: 48px;
            height: 48px;
            border-radius: 0.5rem;
            object-fit: cover;
            flex-shrink: 0;
        }

        .selected-item-meta {
            flex-grow: 1;
        }

        .selected-item-remove {
            border: none;
            background: transparent;
            color: #dc3545;
            font-size: 0.875rem;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const selectedSet = new Set(@json($selectedProductIds));
            const initialSummaries = @json($selectedProductSummaries);
            const productDetails = {};

            initialSummaries.forEach((item) => {
                productDetails[item.id] = item;
            });

            const productCheckboxes = document.querySelectorAll('.product-selector');
            const selectedItemsList = document.getElementById('selected-items-list');
            const selectionEmptyState = document.getElementById('selection-empty-state');
            const selectionSummary = document.getElementById('selection-summary');
            const selectionCount = document.getElementById('selection-count');
            const selectionTotal = document.getElementById('selection-total');
            const bookingHiddenInputs = document.getElementById('booking-hidden-inputs');
            const searchHiddenInputs = document.getElementById('search-hidden-inputs');
            const clearSelectionBtn = document.getElementById('clear-selection-btn');
            const formatter = new Intl.NumberFormat('en-US');

            const syncHiddenInputs = () => {
                bookingHiddenInputs.innerHTML = '';
                searchHiddenInputs.innerHTML = '';

                selectedSet.forEach((id) => {
                    const bookingInput = document.createElement('input');
                    bookingInput.type = 'hidden';
                    bookingInput.name = 'products[]';
                    bookingInput.value = id;
                    bookingHiddenInputs.appendChild(bookingInput);

                    const searchInput = document.createElement('input');
                    searchInput.type = 'hidden';
                    searchInput.name = 'selected[]';
                    searchInput.value = id;
                    searchHiddenInputs.appendChild(searchInput);
                });
            };

            const renderSelectedItems = () => {
                if (selectedSet.size === 0) {
                    selectedItemsList.innerHTML = '';
                    selectionEmptyState.style.display = 'block';
                    selectionSummary.style.display = 'none';
                    return;
                }

                const fragments = document.createDocumentFragment();
                let totalAmount = 0;

                Array.from(selectedSet).forEach((id) => {
                    const data = productDetails[id];
                    if (!data) {
                        return;
                    }

                    totalAmount += Number(data.price) || 0;

                    const wrapper = document.createElement('div');
                    wrapper.className = 'selected-item';
                    wrapper.dataset.productId = id;

                    const image = document.createElement('img');
                    image.src = data.image;
                    image.alt = data.name;
                    image.className = 'selected-item-thumb';
                    wrapper.appendChild(image);

                    const meta = document.createElement('div');
                    meta.className = 'selected-item-meta';

                    const nameEl = document.createElement('p');
                    nameEl.className = 'mb-0 fw-semibold';
                    nameEl.textContent = data.name;

                    const priceEl = document.createElement('small');
                    priceEl.className = 'text-muted';
                    priceEl.textContent = `TZS ${formatter.format(Number(data.price) || 0)}`;

                    meta.appendChild(nameEl);
                    meta.appendChild(priceEl);
                    wrapper.appendChild(meta);

                    const removeBtn = document.createElement('button');
                    removeBtn.type = 'button';
                    removeBtn.className = 'selected-item-remove';
                    removeBtn.textContent = 'Remove';
                    removeBtn.addEventListener('click', () => toggleSelection(id, false));
                    wrapper.appendChild(removeBtn);

                    fragments.appendChild(wrapper);
                });

                selectedItemsList.innerHTML = '';
                selectedItemsList.appendChild(fragments);
                selectionEmptyState.style.display = 'none';
                selectionSummary.style.display = 'block';
                selectionCount.textContent = selectedSet.size;
                selectionTotal.textContent = `TZS ${formatter.format(totalAmount)}`;
            };

            const toggleSelection = (id, shouldSelect, checkbox = null) => {
                const numericId = Number(id);
                if (shouldSelect) {
                    selectedSet.add(numericId);

                    if (!productDetails[numericId] && checkbox) {
                        productDetails[numericId] = {
                            id: numericId,
                            name: checkbox.dataset.name ?? '',
                            price: checkbox.dataset.price ?? 0,
                            image: checkbox.dataset.image ?? '',
                        };
                    }
                } else {
                    selectedSet.delete(numericId);
                    delete productDetails[numericId];
                }

                if (checkbox) {
                    checkbox.checked = shouldSelect;
                } else {
                    const checkboxOnPage = document.getElementById(`product${numericId}`);
                    if (checkboxOnPage) {
                        checkboxOnPage.checked = shouldSelect;
                    }
                }

                syncHiddenInputs();
                renderSelectedItems();
            };

            productCheckboxes.forEach((checkbox) => {
                const productId = checkbox.value;
                if (selectedSet.has(Number(productId))) {
                    checkbox.checked = true;
                    if (!productDetails[productId]) {
                        productDetails[productId] = {
                            id: Number(productId),
                            name: checkbox.dataset.name,
                            price: checkbox.dataset.price,
                            image: checkbox.dataset.image,
                        };
                    }
                }

                checkbox.addEventListener('change', (event) => {
                    toggleSelection(productId, event.target.checked, checkbox);
                });
            });

            clearSelectionBtn.addEventListener('click', () => {
                selectedSet.clear();
                Object.keys(productDetails).forEach((key) => delete productDetails[key]);
                productCheckboxes.forEach((checkbox) => {
                    checkbox.checked = false;
                });
                syncHiddenInputs();
                renderSelectedItems();
            });

            syncHiddenInputs();
            renderSelectedItems();
        });
    </script>

</x-app-layout>
