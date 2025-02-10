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
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            New Firework
                        </button>
                    </div>


                    <div class="col-lg-12 d-flex align-items-stretch">
                        <div class="card w-100">
                            <div class="card-body p-4">
                                <div class="table-responsive">
                                    <table class="table text-nowrap mb-0 align-middle table-bordered">
                                        <thead class="text-dark fs-4">
                                            <tr>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Id</h6>
                                                </th>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Name</h6>
                                                </th>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Category</h6>
                                                </th>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Price(Tsh)</h6>
                                                </th>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Duration(Sec)</h6>
                                                </th>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Quantity</h6>
                                                </th>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Status</h6>
                                                </th>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Actions</h6>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($products as $index => $product)
                                                <tr>
                                                    <td class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">{{ $index + 1 }}</h6>
                                                    </td>
                                                    <td class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-1">{{ $product->product_name }}</h6>
                                                    </td>
                                                    <td class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-1">{{ $product->category }}</h6>
                                                        <span class="fw-normal">{{ $product->event_time }}</span>
                                                    </td>
                                                    <td class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-1">{{ $product->price }}</h6>
                                                        <span class="fw-normal">{{ $product->event_email }}</span>
                                                    </td>
                                                    <td class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-1">{{ $product->duration }}</h6>
                                                    </td>
                                                    <td class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-1">{{ $product->quantity }}</h6>
                                                    </td>
                                                    <td class="border-bottom-0">
                                                        <div class="d-flex align-items-center gap-2">
                                                            <span
                                                                class="badge bg-primary rounded-3 fw-semibold">{{ $product->product_status }}</span>
                                                        </div>
                                                    </td>
                                                    <td class="border-bottom-0">
                                                        <a href="{{ route('products.destroy', $product->id) }}"
                                                            class="text-danger"
                                                            onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this Product?')) { document.getElementById('delete-form-{{ $product->id }}').submit(); }">
                                                            <i class="ti ti-trash"></i>
                                                        </a>
                                                        <form id="delete-form-{{ $product->id }}" action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                        <a href=""><i class="ti ti-eye"></i></a>
                                                    </td>
                                                </tr>
                                                @empty
                                                <tr>
                                                    <td colspan="8" class="text-center">
                                                        <h6 class="fw-semibold mb-0 text-danger">No Fireworks found.</h6>
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Register New Firework</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- product Name -->
                        <div class="mb-3">
                            <label for="product_name" class="form-label">product Name</label>
                            <input type="text" class="form-control" id="product_name" name="product_name" required>
                        </div>


                        <div class="row">
                            <div class="mb-3 col-6">
                                <label for="event_date" class="form-label">Category</label>
                                <input type="text" class="form-control" id="event_date" name="category" required>
                            </div>

                            <!-- Event Time -->
                            <div class="mb-3 col-6">
                                <label for="event_time" class="form-label">Price</label>
                                <input type="text" class="form-control" id="event_time" name="price" required>
                            </div>
                        </div>


                        <div class="row">
                            <div class="mb-3 col-6">
                                <label for="contact_person" class="form-label">Duration</label>
                                <input type="text" class="form-control" id="contact_person" name="duration"
                                    required>
                            </div>
                            <div class="mb-3  col-6">
                                <label for="contact_phone" class="form-label">Quantity</label>
                                <input type="text" class="form-control" id="contact_phone" name="quantity"
                                    required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="contact_person" class="form-label">Product Image</label>
                            <input type="file" class="form-control" id="contact_person" name="image_url"
                                required>
                        </div>

                        <div class="mb-3">
                            <label for="contact_phone" class="form-label">Sample Video url</label>
                            <input type="text" class="form-control" id="contact_phone" name="video_url"
                                required>
                        </div>
                        <!-- product Description -->
                        <div class="mb-3">
                            <label for="product_description" class="form-label">product Description</label>
                            <textarea class="form-control" id="product_description" name="product_description" rows="3"></textarea>
                            <input type="hidden" name="product_status" value="In Stock">
                        </div>

                        <!-- Submit Button -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Add Firework</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>


</x-app-layout>
