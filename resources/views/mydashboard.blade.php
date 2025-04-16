@extends('layouts.front-app')

@section('content')

    <section class="section main-banner " id="top" data-section="section1"
        style="height: 20vh; background-image: url('{{ asset('assets/images/kenseep.jpg') }}');">
        <div class="video-overlay header-text text-center">
            <div class="container">
                <div class="row">
                    <div class="caption">
                        <h2 style="font-size: 40px;">Dashboard</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="container-fluid bg-primary mb-3" style="padding: 20px;">

    </div>

    <div class="container">
        <ul class="nav nav-tabs" id="myTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="bookings-tab" data-bs-toggle="tab" data-bs-target="#bookings"
                    type="button" role="tab">
                    My Bookings
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="products-tab" data-bs-toggle="tab" data-bs-target="#products" type="button"
                    role="tab">
                    Products
                </button>
            </li>
        </ul>

        <div class="tab-content mt-3" id="myTabsContent">
            <!-- My Bookings Tab -->
            <div class="tab-pane fade show active" id="bookings" role="tabpanel">
                <div class="container">
                    @if ($tasks->isEmpty())
                        <div class="bg-primary text-center p-4 mt-5">
                            <p class="text-white">No Booking available yet. </p>
                            <a href="{{ url('/product_list') }}" class="btn btn-warning">Go to Fireworks</a>
                        </div>
                    @else
                        <div class="row">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="card-title fw-semibold ">My Bookings</h5>
                            </div>

                            <div class="col-lg-12 d-flex align-items-stretch">

                                <table class="table text-nowrap align-middle table-bordered">
                                    <thead class="text-dark fs-1">
                                        <tr>
                                            <th>
                                                <h6 class="fw-semibold mb-0">Id</h6>
                                            </th>
                                            <th>
                                                <h6 class="fw-semibold mb-0">Task Name/Place</h6>
                                            </th>

                                            <th>
                                                <h6 class="fw-semibold mb-0">Actions</h6>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tasks as $index => $task)
                                            <tr>
                                                <td>
                                                    <h6 class="fw-semibold mb-0">{{ $index + 1 }}</h6>
                                                </td>
                                                <td>
                                                    <h6 class="fw-semibold py-1">{{ $task->task_name }}</h6>
                                                    @if ($task->task_status == 'Pending')
                                                    <span class="alert alert-danger p-0">{{ $task->task_status }}</span>
                                                    @else
                                                    <span class="alert alert-success p-0">{{ $task->task_status }}</span>
                                                    @endif

                                                </td>

                                                <td>
                                                    <a href="{{ route('task.showTask', $task->id) }}"
                                                        class="btn btn-warning"><i class="fa fa-eye"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif
                </div>


            </div>

            <!-- Products Tab -->
            <div class="tab-pane fade" id="products" role="tabpanel">
                <h6>Products</h6>
                <p>List of products will go here.</p>
            </div>
        </div>
    </div>


    <script>
        @if (session('success'))
            swal("Success!", "{{ session('success') }}", "success");
        @elseif (session('error'))
            swal("Oops!", "{{ session('error') }}", "error");
        @endif
    </script>

@endsection
