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
                        <h5 class="card-title fw-semibold ">List of Categories</h5>
                        @if (Auth::check() && Auth::user()->hasRole('admin'))
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                       New Category
                        </button>
                        @else
                        <button type="button" class="btn btn-primary show-toastr">New Category</button>
                        @endif

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
                                                <th> Actions </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($categories as $index => $category)
                                                <tr>
                                                    <td>{{ $index + 1 }} </td>
                                                    <td> {{ $category->category_name }} </td>

                                                    <td>
                                                        @if (Auth::check() && Auth::user()->hasRole('admin'))
                                                        <a href="{{ route('category.destroy', $category->id) }}"
                                                            class="badge bg-danger"
                                                            onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this category?')) { document.getElementById('delete-form-{{ $category->id }}').submit(); }">
                                                            <i class="ti ti-trash"></i>
                                                        </a>
                                                        <form id="delete-form-{{ $category->id }}"
                                                            action="{{ route('category.destroy', $category->id) }}"
                                                            method="POST" style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>

                                                            @else
                                                            <a href="#" class="badge bg-danger show-toastr">
                                                                <i class="ti ti-trash"></i>
                                                            </a>

                                                            @endif
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="8" class="text-center">
                                                        <h6 class="fw-semibold mb-0 text-danger">No Category found.
                                                        </h6>
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
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Register New Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('category.store') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- category Name -->
                        <div class="mb-3">
                            <label for="category_name" class="form-label">category Name</label>
                            <input type="text" class="form-control" id="category_name" name="category_name"
                                placeholder="Name" required value="{{ old('category_name') }}">
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Add Category</button>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>


</x-app-layout>
