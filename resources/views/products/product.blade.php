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
                        @if (Auth::check() && Auth::user()->userType == '0')
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        New Firework
                        </button>
                        @else
                        <button type="button" class="btn btn-primary show-toastr">New Firework</button>
                        @endif

                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <form action="{{ route('products.index') }}" method="GET" class="d-flex">
                                <input type="text" name="search" value="{{ request()->input('search') }}"
                                    class="form-control" placeholder="Search Products">
                                <button type="submit" class="btn btn-primary ms-2">Search</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-12 d-flex align-items-stretch">
                        <div class="card w-100">
                            <div class="card-body p-4">
                                <div class="table-responsive">
                                    <table class="table text-nowrap mb-0 align-middle table-bordered">
                                        <thead class="text-dark fs-4">
                                            <tr>
                                                <th>Id</th>
                                                <th> Name</th>
                                                <th>Category</th>
                                                <th> Price(Tsh)</th>
                                                <th> Duration(Sec)</th>
                                                <th> Pieces</th>
                                                <th>Quantity</th>
                                                <th>  Status</th>
                                                <th> Actions </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($products as $index => $product)
                                                <tr>
                                                    <td>{{ $index + 1 }} </td>
                                                    <td> {{ $product->product_name }} </td>
                                                    <td>{{ $product->category }}</td>
                                                    <td>{{ number_format($product->price) }} </td>
                                                    <td>{{ $product->duration }}</td>
                                                    <td>{{ $product->piece }}</td>
                                                    <td>{{ $product->quantity }}</td>
                                                    <td>
                                                        @if($product->quantity == 0)
                                                            <span
                                                                class="alert alert-danger p-1">Out of Stock</span>
                                                        @elseif ($product->quantity < 10)
                                                            <span
                                                                class="alert alert-warning p-1">Limited Stock</span>
                                                        @elseif ($product->quantity >= 10)
                                                            <span
                                                                class="alert alert-success p-1">In Stock</span>

                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if (Auth::check() && Auth::user()->userType == '0')
                                                        <a href="{{ route('products.destroy', $product->id) }}"
                                                            class="badge bg-danger"
                                                            onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this Product?')) { document.getElementById('delete-form-{{ $product->id }}').submit(); }">
                                                            <i class="ti ti-trash"></i>
                                                        </a>
                                                        <form id="delete-form-{{ $product->id }}"
                                                            action="{{ route('products.destroy', $product->id) }}"
                                                            method="POST" style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                        <a href="{{ route('products.edit', $product->id) }}"
                                                            class="badge bg-primary"><i class="ti ti-edit"></i></a>
                                                            @else
                                                            <a href="#" class="badge bg-danger show-toastr">
                                                                <i class="ti ti-trash"></i>
                                                            </a>

                                                            <a href="#" class="badge bg-primary show-toastr"><i class="ti ti-edit"></i></a>
                                                            @endif
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="8" class="text-center">
                                                        <h6 class="fw-semibold mb-0 text-danger">No Fireworks found.
                                                        </h6>
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Pagination -->
                                <div class="d-flex justify-content-between mt-3">
                                    <div class="align-self-center">
                                        <p>Showing {{ $products->firstItem() }} to {{ $products->lastItem() }} of
                                            {{ $products->total() }} products</p>
                                    </div>
                                    <div class="align-self-center">
                                        {{ $products->links('vendor.pagination.bootstrap-4') }}
                                        <!-- Bootstrap pagination links -->
                                    </div>
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

                        <!-- Product Name -->
                        <div class="mb-3">
                            <label for="product_name" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="product_name" name="product_name"
                                placeholder="Name" required value="{{ old('product_name') }}">
                        </div>

                        <div class="row">
                            <div class="mb-3 col-6">
                                <label for="category" class="form-label">Category</label>
                                <select name="category" id="category" class="form-control">
                                    <option value="">--Select Category--</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->category_name }}"
                                            {{ old('category') == $category->category_name ? 'selected' : '' }}>
                                            {{ $category->category_name }}</option>
                                    @endforeach
                                </select>

                            </div>

                            <!-- Price -->
                            <div class="mb-3 col-6">
                                <label for="price" class="form-label">Price</label>
                                <input type="text" class="form-control" id="price" name="price"
                                    placeholder="in Tzs" required value="{{ old('price') }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-6">
                                <label for="duration" class="form-label">Duration</label>
                                <input type="number" class="form-control" id="duration" name="duration"
                                    placeholder="in seconds" required value="{{ old('duration') }}">
                            </div>
                            <div class="mb-3 col-6">
                                <label for="quantity" class="form-label">Pieces per Firework</label>
                                <input type="number" class="form-control" id="piece" name="piece"
                                    placeholder="Pieces" required value="{{ old('piece') }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-6">
                                <label for="image_url" class="form-label">Product Image</label>
                                <input type="file" class="form-control" id="image_url" name="image_url" required>
                            </div>
                            <div class="mb-3 col-6">
                                <label for="quantity" class="form-label">Quantity</label>
                                <input type="number" class="form-control" id="quantity" name="quantity"
                                    placeholder="Quantity" required value="{{ old('quantity') }}">
                            </div>
                        </div>



                        <div class="mb-3">
                            <label for="video_url" class="form-label">Sample Video URL</label>
                            <input type="text" class="form-control" id="video_url" name="video_url"
                                placeholder="YouTube URL" required value="{{ old('video_url') }}">
                        </div>

                        <!-- Product Description -->
                        <div class="mb-3">
                            <label for="product_description" class="form-label">Product Description</label>
                            <textarea class="form-control" id="product_description" name="product_description" rows="3">{{ old('product_description') }}</textarea>
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
