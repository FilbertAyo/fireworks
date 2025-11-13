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

                    <div class="">
                        <h5 class="card-title fw-semibold mb-4">List of Tasks</h5>
                    </div>

                    <div class="col-lg-12 d-flex align-items-stretch">
                        <div class="card w-100 shadow-none border ">
                            <div class="card-body p-4">

                                <div class="table-responsive">
                                    <table class="table text-nowrap mb-0 align-middle table-bordered">
                                        <thead class="text-dark fs-4">
                                            <tr>
                                                <th>
                                                    Id</h6>
                                                </th>
                                                <th>
                                                    Assignee</h6>
                                                </th>
                                                <th>
                                                    Task</h6>
                                                </th>
                                                <th>
                                                    Total Expenses</h6>
                                                </th>
                                                <th>
                                                    Status</h6>
                                                </th>

                                                <th>
                                                    Actions</h6>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($assignments as $index => $assignment)
                                                <tr>
                                                    <td>
                                                        {{ $index + 1 }}
                                                    </td>
                                                    <td>
                                                        {{ $assignment->user->name }}
                                                    </td>
                                                    <td>
                                                        {{ $assignment->task->task_name }}
                                                    </td>
                                                    <td>
                                                        {{ $assignment->task->total_amount }}
                                                    </td>
                                                    <td>

                                                            <span class="alert p-1
                                                                {{ $assignment->status == 'pending' ? 'alert-danger' : 'alert-success' }} ">
                                                                {{ $assignment->status }}
                                                            </span>

                                                    </td>
                                                    <td>
                                                        <a href="{{ route('assignments.show',$assignment->id) }}" class="badge bg-primary"><i class="ti ti-eye"></i></a>
                                                        <a href="{{ route('assignments.destroy', $assignment->id) }}"
                                                            class="badge bg-danger"
                                                            onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this assignment?')) { document.getElementById('delete-form-{{ $assignment->id }}').submit(); }">
                                                            <i class="ti ti-trash"></i>
                                                        </a>
                                                        <form id="delete-form-{{ $assignment->id }}" action="{{ route('assignments.destroy', $assignment->id) }}" method="POST" style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>

                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="5" class="text-center">
                                                        <h6 class="fw-semibold mb-0 text-danger">No assignments found.</h6>
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
                    <h5 class="modal-title" id="exampleModalLabel">Register</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form method="POST" action="{{ route('assignments.store') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="user" class="form-label">Select User</label>
                            <select class="form-select" id="user" name="assignee" required>
                                <option value="" selected disabled>Select a User</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->name }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="task" class="form-label">Select Task</label>
                            <select class="form-select" id="task" name="task" required>
                                <option value="" selected disabled>Select a Task</option>
                                @foreach($tasks as $task)
                                    <option value="{{ $task->task_name }}">{{ $task->task_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Assign Task</button>
                    </form>

                </div>
            </div>
        </div>
    </div>


</x-app-layout>
