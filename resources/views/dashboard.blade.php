<x-app-layout>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        @include('layouts.aside')
        <div class="body-wrapper">
            @include('layouts.navigation')
            <div class="m-3">
                <div class="row">

                    <div class="col-lg-3">
                        <!-- Yearly Breakup -->
                        <div class="card overflow-hidden">
                          <div class="card-body p-4">
                            <h5 class="card-title mb-9 fw-semibold">My Collections</h5>
                            <div class="row align-items-center">
                              <div class="col-8">
                                <h4 class="fw-semibold mb-3">{{ number_format($my_collection ?? 0) }}
                                </h4>

                              </div>
                              <div class="col-4">
                                <div class="d-flex justify-content-end">
                                  <div
                                    class="text-white bg-light-success rounded-circle p-6 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-currency-dollar fs-6 text-success"></i>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                    <div class="col-lg-3">
                        <!-- Yearly Breakup -->
                        <div class="card overflow-hidden">
                          <div class="card-body p-4">
                            <h5 class="card-title mb-9 fw-semibold">Total Allowance</h5>
                            <div class="row align-items-center">
                              <div class="col-8">
                                <h4 class="fw-semibold mb-3">{{ number_format($allowance ?? '0') }}</h4>
                              </div>
                              <div class="col-4">
                                <div class="d-flex justify-content-end">
                                  <div
                                    class="text-white bg-light-info rounded-circle p-6 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-wallet fs-6 text-info"></i>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-3">
                        <!-- Yearly Breakup -->
                        <div class="card overflow-hidden">
                          <div class="card-body p-4">
                            <h5 class="card-title mb-9 fw-semibold">Transport</h5>
                            <div class="row align-items-center">
                              <div class="col-8">
                                <h4 class="fw-semibold mb-3">{{ number_format($transport ?? '0')}}</h4>
                              </div>
                              <div class="col-4">
                                <div class="d-flex justify-content-end">
                                  <div
                                    class="text-white bg-light-warning rounded-circle p-6 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-bus fs-6 text-warning"></i>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-3">
                        <!-- Yearly Breakup -->
                        <div class="card overflow-hidden">
                          <div class="card-body p-4">
                            <h5 class="card-title mb-9 fw-semibold">Accommodation</h5>
                            <div class="row align-items-center">
                              <div class="col-8">
                                <h4 class="fw-semibold mb-3">{{ number_format($accommodation ?? '0' )}}</h4>

                              </div>
                              <div class="col-4">
                                <div class="d-flex justify-content-end">
                                  <div
                                    class="text-white bg-light-primary rounded-circle p-6 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-bed fs-6 text-primary"></i>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="py-3">
                        <h3>Company Evaluations</h3>
                      </div>

                      <div class="col-lg-6">
                        <div class="card p-3">
                            <form method="GET" action="{{ url('/dash') }}" class="mb-3">
                                <div class="row">
                                    <div class="col-md-5">
                                        <select name="year" class="form-control">
                                            <option value="all" {{ $year == 'all' ? 'selected' : '' }}>All Years</option>
                                            @for($i = date('Y'); $i >= 2020; $i--)
                                                <option value="{{ $i }}" {{ $i == $year ? 'selected' : '' }}>{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="col-md-5">
                                        <select name="month" class="form-control">
                                            <option value="all" {{ $month == 'all' ? 'selected' : '' }}>All Months</option>
                                            @foreach(range(1, 12) as $m)
                                                <option value="{{ $m }}" {{ $m == $month ? 'selected' : '' }}>
                                                    {{ date('F', mktime(0, 0, 0, $m, 1)) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-primary">Filter</button>
                                    </div>
                                </div>
                            </form>

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>Amount (TZS)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Total Amount</td>
                                        <td>collections</td>
                                        <td>{{ number_format($totalCollection) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Allowance Expenses</td>
                                        <td>Expense</td>
                                        <td>{{ number_format($totalAllowance) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Transport Expenses</td>
                                        <td>Expense</td>
                                        <td>{{ number_format($totalTransport) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Accommodation Expenses</td>
                                        <td>Expense</td>
                                        <td>{{ number_format($totalAccommodation) }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Profit/Loss</strong></td>
                                        <td></td>
                                        <td>
                                            <strong class="{{ $profitLoss >= 0 ? 'text-success' : 'text-danger' }}">
                                                {{ $profitLoss >= 0 ? '+' : '-' }} {{ number_format(abs($profitLoss)) }}
                                            </strong>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                          </div>
                      </div>

                      <div class="col-lg-6">
                        <div class="card">
                        <div class="row">
                            <div class="col-lg-4">

                                    <div class="card-body">
                                        <h6>Total Events</h6>
                                        <h4>{{ $events }}</h4>
                                    </div>

                            </div>
                            <div class="col-lg-4">

                                    <div class="card-body">
                                        <h6>Upcoming Events</h6>
                                        <h4>{{ $up_events }} </h4>
                                    </div>

                            </div>
                            <div class="col-lg-4">

                                    <div class="card-body">
                                        <h6>Events Done</h6>
                                        <h4>{{ $done_events }} </h4>
                                    </div>
                                </div>
                        </div>
                          </div>
                      </div>

                </div>
            </div>
        </div>
    </div>



</x-app-layout>
