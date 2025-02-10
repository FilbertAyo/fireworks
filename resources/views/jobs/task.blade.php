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
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            New Task
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
                                                        <h6 class="fw-semibold mb-1">{{ $task->total_amount }}</h6>
                                                    </td>
                                                    <td class="border-bottom-0">
                                                        <div class="d-flex align-items-center gap-2">
                                                            <span
                                                                class="badge bg-primary rounded-3 fw-semibold">{{ $task->task_status }}</span>
                                                        </div>
                                                    </td>
                                                    <td class="border-bottom-0">
                                                        {{-- <a href=""><i class="ti ti-trash"></i></a> --}}
                                                        <a href="{{ route('task.show', $task->id) }}" class="badge bg-warning">View</a>
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
                    <h5 class="modal-title" id="exampleModalLabel">Register</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('task.store') }}">
                        @csrf

                        <!-- Task Name -->
                        <div class="mb-3">
                            <label for="task_name" class="form-label">Task Name</label>
                            <input type="text" class="form-control" id="task_name" name="task_name" required>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-6">
                                <label for="event_date" class="form-label">Event Date</label>
                                <input type="date" class="form-control" id="event_date" name="event_date" required>
                            </div>

                            <!-- Event Time -->
                            <div class="mb-3 col-6">
                                <label for="event_time" class="form-label">Event Time</label>
                                <input type="time" class="form-control" id="event_time" name="event_time" required>
                            </div>
                        </div>
                        <!-- Event Address -->
                        <div class="mb-3">
                            <label for="event_address" class="form-label">Event Address</label>
                            <input type="text" class="form-control" id="event_address" name="event_address" required>
                            <small class="form-text text-muted">You can also select the location on the map
                                below.</small>
                            <div id="map" style="height: 300px; margin-top: 10px;"></div>
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
                            <input type="text" class="form-control" id="contact_person" name="event_email"
                                required>
                        </div>
                        <!-- Task Description -->
                        <div class="mb-3">
                            <label for="task_description" class="form-label">Task Description</label>
                            <textarea class="form-control" id="task_description" name="task_description" rows="3"></textarea>
                        </div>

                        <!-- Task Status -->
                        <div class="mb-3" style="display: none;">
                            <label for="task_status" class="form-label">Task Status</label>
                            <input type="text" class="form-control" id="contact_person" value="Pending" name="task_status"
                            required>

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

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>

    <script>
        var map = L.map('map').setView([51.505, -0.09], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
        }).addTo(map);

        var marker = L.marker([51.505, -0.09]).addTo(map);

        map.on('click', function(e) {
            marker.setLatLng(e.latlng);
            document.getElementById('event_address').value = `Lat: ${e.latlng.lat}, Lng: ${e.latlng.lng}`;
        });
    </script>

</x-app-layout>
