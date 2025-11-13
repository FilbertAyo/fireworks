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
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title fw-semibold mb-4">Assignment Details</h5>
                    </div>

                    <div class="col-lg-12 d-flex align-items-stretch">
                        <div class="card w-100 shadow-none border  shadow-sm">
                            <div class="card-body p-4">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <th class="bg-light">Employee Name</th>
                                            <td>{{ $assignment->user->name }}</td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light">Task</th>
                                            <td>{{ $assignment->task->task_name }}</td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light">Date of Event</th>
                                            <td>
                                                {{ \Carbon\Carbon::parse($assignment->task->event_date)->format('M d,Y, l') }},
                                                {{ \Carbon\Carbon::parse($assignment->task->event_time)->format('h:i A') }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light">Status</th>
                                            <td>
                                                <span
                                                    class="badge
                                                    {{ $assignment->status == 'pending' ? 'bg-danger' : 'bg-success' }}
                                                    rounded-3 fw-semibold">
                                                    {{ ucfirst($assignment->status) }}
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light" >Total Amount</th>
                                            <td >{{ $assignment->total_amount }}</td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="d-flex justify-content-between align-items-center ">
                        <h5 class="card-title fw-semibold mb-4">Payment Details</h5>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#updatePaymentModal">
                            Update Payment
                        </button>
                    </div>

                    <div class="col-lg-12 d-flex align-items-stretch">
                        <div class="card w-100 shadow-none border  shadow-sm">
                            <div class="card-body p-4">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Payment Type</th>
                                            <th>Amount</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @if ($payments->isEmpty())
                                            <tr>
                                                <td colspan="4">
                                                    <div class="text-center">
                                                    <div class="alert alert-danger">No Payment is made yet.</div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @else
                                            @foreach ($payments as $payment)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $payment->expense_type }}</td>
                                                    <td>{{ $payment->amount }}</td>
                                                    <td>
                                                        <a href="{{ route('payment.destroy', $payment->id) }}"
                                                            class="badge bg-danger"
                                                            onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this {{ $payment->expense_type }} Payment of TZS {{ $payment->amount }}/=?')) { document.getElementById('delete-form-{{ $assignment->id }}').submit(); }">
                                                            <i class="ti ti-trash"></i> Delete
                                                        </a>
                                                        <form id="delete-form-{{ $assignment->id }}" action="{{ route('payment.destroy', $payment->id) }}" method="POST" style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach

                                            <tr>
                                                <th class="bg-light" colspan="2">Total Amount</th>
                                                <td colspan="2">{{ $assignment->total_amount }}</td>
                                            </tr>

                                        @endif



                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>


                <!-- Bootstrap Modal for Updating Payment -->
                <div class="modal fade" id="updatePaymentModal" tabindex="-1" aria-labelledby="updatePaymentModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="updatePaymentModalLabel">Update Payment</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('payment_update') }}" method="POST">
                                    @csrf

                                    <input type="hidden" value="{{ $assignment->id }}" name="assignment_id">
                                    <input type="hidden" value="{{ $assignment->user->id }}" name="user_id">
                                    <input type="hidden" value="{{ $assignment->task->id }}" name="task_id">

                                    <div class="mb-3">
                                        <label for="status" class="form-label">Expense Type</label>
                                        <select class="form-control" id="status" name="expense_type">
                                            <option value="allowance">Allowance</option>
                                            <option value="transport">Transport</option>
                                            <option value="accommodation">Accommodation</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="amount" class="form-label">Payment Amount</label>
                                        <input type="number" class="form-control" id="amount" name="amount"
                                            placeholder="Enter amount" required>
                                    </div>

                                    <div class="text-end">
                                        <button type="submit" class="btn btn-success">Submit</button>
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
