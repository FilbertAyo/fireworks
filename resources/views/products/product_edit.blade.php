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
                        <h5 class="card-title fw-semibold ">Edit Firework: {{ $product->product_name }}</h5>
                    </div>


                    <div class="col-lg-12 d-flex align-items-stretch">
                        <div class="card w-100">
                            <div class="card-body p-4">

                                <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="row">
                                        <!-- Firework Image Upload -->
                                        <div class="col-md-4 text-center">
                                            <img src="{{ asset($product->image_url) }}" alt="{{ $product->product_name }}" class="img-fluid rounded mb-3">
                                            <input type="file" name="image_url" class="form-control">
                                        </div>

                                        <!-- Firework Details -->
                                        <div class="col-md-8">
                                            <div class="mb-3">
                                                <label class="form-label">Product Name</label>
                                                <input type="text" name="product_name" class="form-control" value="{{ $product->product_name }}" required>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Category</label>
                                                <input type="text" name="category" class="form-control" value="{{ $product->category }}" required>
                                            </div>


                                            <div class="mb-3">
                                                <label class="form-label">Price (TZS)</label>
                                                <input type="number" name="price" class="form-control" value="{{ $product->price }}" required>
                                            </div>


                                            <div class="mb-3">
                                                <label class="form-label">Duration (minutes)</label>
                                                <input type="number" name="duration" class="form-control" value="{{ $product->duration }}" required>
                                            </div>
                                            <div class="row">
                                                <div class="mb-3 col-6">
                                                    <label class="form-label">Quantity</label>
                                                    <input type="number" name="quantity" class="form-control" value="{{ $product->quantity }}" required>
                                                </div>

                                                <div class="mb-3 col-6">
                                                    <label class="form-label">Product Status</label>
                                                    <select name="product_status" class="form-control">
                                                        <option value="Available" {{ $product->product_status == 'Available' ? 'selected' : '' }}>Available</option>
                                                        <option value="Sold Out" {{ $product->product_status == 'Sold Out' ? 'selected' : '' }}>Sold Out</option>
                                                    </select>
                                                </div>

                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Description</label>
                                                <input type="text" name="product_description" class="form-control" value="{{ $product->product_description }}" required>
                                            </div>

                                            <!-- Save Changes Button -->
                                            <button type="submit" class="btn btn-primary">
                                                <i class="ti ti-check"></i> Save Changes
                                            </button>




                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>



            </div>
        </div>
    </div>
    </div>


</x-app-layout>
