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
                        <h5 class="card-title fw-semibold ">List of Tasks</h5>
                    <a href="{{ route('products.list') }}" class="btn btn-primary">
                            New Task
                    </a>
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
                                                    <h6 class="fw-semibold mb-0">Date & Time</h6>
                                                </th>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Contacts</h6>
                                                </th>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Where</h6>
                                                </th>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Price (TZS)</h6>
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
                                            @foreach ($tasks as $index => $task)
                                                <tr>
                                                    <td class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">{{ $index + 1 }}</h6>
                                                    </td>
                                                    <td class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-1">{{ $task->task_name }}</h6>
                                                    </td>
                                                    <td class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-1">{{ $task->event_date }}</h6>
                                                        <span class="fw-normal">{{ $task->event_time }}</span>
                                                    </td>
                                                    <td class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-1">{{ $task->event_phone }}</h6>
                                                        <span class="fw-normal">{{ $task->event_email }}</span>
                                                    </td>
                                                    <td class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-1">{{ $task->event_address }}</h6>
                                                    </td>
                                                    <td class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-1">{{ number_format($task->total_amount) }}</h6>
                                                    </td>
                                                    <td class="border-bottom-0">
                                                        @if ($task->task_status == 'Pending')
                                                        <span class="alert alert-warning p-1">{{ $task->task_status }}</span>
                                                    @elseif ($task->task_status == 'Completed')
                                                        <span class="alert alert-success p-1">{{ $task->task_status }}</span>
                                                    @endif
                                                    </td>
                                                    <td class="border-bottom-0">
                                                        <a href="{{ route('task.show', $task->id) }}" class="badge bg-primary"><i class="ti ti-eye"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach

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
                    <h5 class="modal-title" id="exampleModalLabel">List of Products</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form method="GET" action="{{ route('book_create') }}">
                        @csrf
                        <div class="row col-12">
                            @forelse ($products as $product)
                                <div class="col-lg-3 col-md-4">
                                    <div class="property-item rounded overflow-hidden bg-light">
                                        <div class="position-relative overflow-hidden">
                                            <a>
                                                <img class="img-fluid" src="{{ asset($product->image_url) }}"
                                                    >
                                            </a>

                                        </div>
                                        <div class="p-4 pb-0">
                                            <h6 class="text-primary mb-1">TZS {{ $product->price }}</h6>
                                            <a class="d-block h6 mb-2" href="">{{ $product->product_name }}</a>

                                        </div>
                                        <div class="d-flex border-top">
                                            <small class="flex-fill text-center border-end ">{{ $product->duration }}'s</small>
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

                </div>
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>



</x-app-layout>
