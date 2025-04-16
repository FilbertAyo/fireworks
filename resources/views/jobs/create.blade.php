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
                        <h5 class="card-title fw-semibold ">New Task</h5>
                    </div>

                    <div class="col-lg-12 d-flex align-items-stretch">
                        <div class="card w-100">
                            <div class="card-body p-4">
                                <form method="POST" action="{{ route('task.store') }}">
                                    @csrf

                                    {{-- <input type="hidden" name="user_id" value="0"> --}}

                                    <h5 class="text-danger">Selected Products</h5>
                                    @if ($selectedProducts->isEmpty())
                                        <div class="bg-danger text-center p-4">
                                            <p class="text-white">No products selected. </p>
                                            <a class="badge bg-primary" href="{{ url('book/products') }}">Select Fireworks</a>
                                        </div>
                                    @else
                                        <div class="row mt-3">
                                            @foreach ($selectedProducts as $product)
                                            <div class="col-lg-2 col-md-3 mb-3">
                                                    <div class="property-item rounded shadow-sm overflow-hidden border">
                                                        <div class="position-relative overflow-hidden">
                                                            <a href="javascript:void(0);" data-bs-toggle="modal"
                                                                data-bs-target="#productModal{{ $product->id }}">
                                                                <img class="img-fluid" src="{{ asset($product->image_url) }}" alt="Product Image">
                                                            </a>
                                                        </div>
                                                        <div class="p-3 pb-0">
                                                            <h5 class="text-primary mb-1" id="price{{ $product->id }}"
                                                                data-base-price="{{ $product->price }}">
                                                                TZS {{ $product->price }}/=
                                                            </h5>
                                                            <a class="d-block h5 mb-2 text-decoration-none text-dark"
                                                                href="">{{ $product->product_name }}</a>
                                                            <div class="d-flex align-items-center mb-3">
                                                                <button type="button" class="btn btn-outline-primary btn-sm me-2"
                                                                    onclick="updateQuantity('minus', {{ $product->id }})">-</button>
                                                                <input type="number" class="form-control text-center w-25"
                                                                    id="quantityInput{{ $product->id }}"
                                                                    name="product_quantity[]" value="1" min="1"
                                                                    readonly>
                                                                <button type="button" class="btn btn-outline-primary btn-sm ms-2"
                                                                    onclick="updateQuantity('plus', {{ $product->id }})">+</button>
                                                            </div>
                                                        </div>

                                                        <!-- this are needed to be uploaded to the database -->
                                                        <input type="hidden" name="product_id[]" value="{{ $product->id }}" >
                                                        <input type="hidden" name="product_image[]" value="{{ $product->image_url }}">
                                                        <input type="hidden" name="product_name[]" value="{{ $product->product_name }}">
                                                        <input type="hidden" name="product_price[]" value="{{ $product->price }}" id="hiddenPrice{{ $product->id }}">

                                                    </div>
                                                </div>

                                                <div class="modal fade" id="productModal{{ $product->id }}" tabindex="-1"
                                                    aria-labelledby="productModalLabel{{ $product->id }}" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="productModalLabel{{ $product->id }}">
                                                                    {{ $product->product_name }}</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <img class="img-fluid mb-3" src="img/property-1.jpg" alt="Product Image">
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <p><strong>Price:</strong> TZS {{ $product->price }}</p>
                                                                        <p><strong>Category:</strong> {{ $product->category }}</p>
                                                                        <p><strong>Duration:</strong> {{ $product->duration }}'s</p>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <p><strong>Product Status:</strong> {{ $product->product_status }}</p>
                                                                        <p><strong>Video URL:</strong> <a href="{{ $product->video_url }}"
                                                                                target="_blank">View Video</a></p>
                                                                    </div>
                                                                </div>
                                                                <p><strong>Description:</strong> {{ $product->product_description }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif

                                    <h5 class="text-danger">Task details</h5>
                                    <!-- Task Name -->
                                    <div class="mb-3 mt-3">
                                        <label for="task_name" class="form-label">Task Name</label>
                                        <input type="text" class="form-control" id="task_name" name="task_name"
                                            required>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 col-6">
                                            <label for="event_date" class="form-label">Event Date</label>
                                            <input type="date" class="form-control" id="event_date" name="event_date"
                                                required>
                                        </div>

                                        <!-- Event Time -->
                                        <div class="mb-3 col-6">
                                            <label for="event_time" class="form-label">Event Time</label>
                                            <input type="time" class="form-control" id="event_time" name="event_time"
                                                required>
                                        </div>
                                    </div>
                                    <!-- Event Address -->
                                    <div class="mb-3">
                                        <label for="event_address" class="form-label">Event Address</label>
                                        <input type="text" class="form-control" id="event_address"
                                            name="event_address" required>

                                    </div>
                                    <!-- Contact Phone -->
                                    <div class="mb-3">
                                        <label for="contact_phone" class="form-label">Contact Phone</label>
                                        <input type="tel" class="form-control" id="contact_phone" name="event_phone"
                                            required>
                                    </div>
                                    <!-- Contact Person -->
                                    <div class="mb-3">
                                        <label for="contact_person" class="form-label">Email</label>
                                        <input type="text" class="form-control" id="contact_person"
                                            name="event_email" required>
                                    </div>
                                    <!-- Task Description -->
                                    <div class="mb-3">
                                        <label for="task_description" class="form-label">Task Description</label>
                                        <textarea class="form-control" id="task_description" name="task_description" rows="3"></textarea>
                                    </div>

                                    <!-- Task Status -->
                                    <div class="mb-3" style="display: none;">
                                        <label for="task_status" class="form-label">Task Status</label>
                                        <input type="text" class="form-control" id="contact_person" value="Pending"
                                            name="task_status" required>

                                    </div>

                                    <!-- Submit Button -->
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Create Task</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <script>
        function updateQuantity(action, productId) {
            const quantityInput = document.getElementById(`quantityInput${productId}`);
            const priceElement = document.querySelector(`#price${productId}`);
            const hiddenPriceInput = document.querySelector(`#hiddenPrice${productId}`);
            const basePrice = parseFloat(priceElement.dataset.basePrice); // Base price from data attribute
            let quantity = parseInt(quantityInput.value);

            if (action === 'plus') {
                quantity += 1;
            } else if (action === 'minus' && quantity > 1) {
                quantity -= 1;
            }

            quantityInput.value = quantity;

            // Calculate new price
            const newPrice = basePrice * quantity;

            // Update the price dynamically
            priceElement.textContent = `TZS ${newPrice.toLocaleString()}/=`;
            hiddenPriceInput.value = newPrice; // Update the hidden price input
        }
    </script>



    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>



</x-app-layout>
