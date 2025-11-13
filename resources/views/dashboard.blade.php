<x-app-layout>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        @include('layouts.aside')
        <div class="body-wrapper">
            @include('layouts.navigation')
            <div class="m-3">
                <div class="row g-3">
                    @php
                        $totalExpenses = ($totalAllowance ?? 0) + ($totalTransport ?? 0) + ($totalAccommodation ?? 0);
                        $expenseBreakdown = [
                            'Allowance' => $totalAllowance ?? 0,
                            'Transport' => $totalTransport ?? 0,
                            'Accommodation' => $totalAccommodation ?? 0,
                        ];
                        $topExpense = collect($expenseBreakdown)->sortDesc()->keys()->first();
                        $expenseShare = $totalCollection > 0 ? round(($totalExpenses / max($totalCollection, 1)) * 100, 1) : 0;
                    @endphp

                    @if (Auth::user()->hasRole('admin'))
                        <div class="col-12">
                            <div class="row g-3">
                                <div class="col-md-6 col-xl-3">
                                    <div class="card shadow-none border h-100">
                          <div class="card-body p-4">
                                            <h6 class="text-muted mb-2">Total Collections</h6>
                                            <h3 class="fw-semibold mb-1">{{ number_format($totalCollection) }}</h3>
                                            <span class="badge bg-light text-success fw-semibold">Company-wide</span>
                              </div>
                                  </div>
                                </div>
                                <div class="col-md-6 col-xl-3">
                                    <div class="card shadow-none border h-100">
                                        <div class="card-body p-4">
                                            <h6 class="text-muted mb-2">Total Expenses</h6>
                                            <h3 class="fw-semibold mb-1">{{ number_format($totalExpenses) }}</h3>
                                            <span class="badge bg-light text-body fw-semibold">{{ $expenseShare }}% of collections</span>
                              </div>
                            </div>
                          </div>
                                <div class="col-md-6 col-xl-3">
                                    <div class="card shadow-none border h-100">
                                        <div class="card-body p-4">
                                            <h6 class="text-muted mb-2">Net Profit / Loss</h6>
                                            <h3 class="fw-semibold mb-1 {{ $profitLoss >= 0 ? 'text-success' : 'text-danger' }}">
                                                {{ $profitLoss >= 0 ? '+' : '-' }} {{ number_format(abs($profitLoss)) }}
                                            </h3>
                                            <span class="badge {{ $profitLoss >= 0 ? 'bg-light text-success' : 'bg-light text-danger' }} fw-semibold">
                                                {{ $profitLoss >= 0 ? 'Positive performance' : 'Review spending' }}
                                            </span>
                        </div>
                                  </div>
                                </div>
                                <div class="col-md-6 col-xl-3">
                                    <div class="card shadow-none border h-100">
                                        <div class="card-body p-4">
                                            <h6 class="text-muted mb-2">Largest Expense</h6>
                                            <h3 class="fw-semibold mb-1">{{ $topExpense }}</h3>
                                            <span class="badge bg-light text-body fw-semibold">
                                                {{ number_format($expenseBreakdown[$topExpense] ?? 0) }} TZS
                                            </span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    @else
                        <div class="col-12">
                            <div class="row g-3">
                                <div class="col-md-6 col-xl-3">
                                    <div class="card shadow-none border h-100">
                          <div class="card-body p-4">
                                            <h6 class="text-muted mb-2">My Collections</h6>
                                            <h3 class="fw-semibold mb-1">{{ number_format($my_collection ?? 0) }}</h3>
                                            <span class="badge bg-light text-success fw-semibold">Updated in real time</span>
                              </div>
                                  </div>
                                </div>
                                <div class="col-md-6 col-xl-3">
                                    <div class="card shadow-none border h-100">
                                        <div class="card-body p-4">
                                            <h6 class="text-muted mb-2">My Allowance</h6>
                                            <h3 class="fw-semibold mb-1">{{ number_format($allowance ?? 0) }}</h3>
                                            <span class="badge bg-light text-body fw-semibold">Approved claims</span>
                              </div>
                            </div>
                                </div>
                                <div class="col-md-6 col-xl-3">
                                    <div class="card shadow-none border h-100">
                                        <div class="card-body p-4">
                                            <h6 class="text-muted mb-2">My Transport</h6>
                                            <h3 class="fw-semibold mb-1">{{ number_format($transport ?? 0) }}</h3>
                                            <span class="badge bg-light text-body fw-semibold">Submitted receipts</span>
                          </div>
                        </div>
                      </div>
                                <div class="col-md-6 col-xl-3">
                                    <div class="card shadow-none border h-100">
                          <div class="card-body p-4">
                                            <h6 class="text-muted mb-2">My Accommodation</h6>
                                            <h3 class="fw-semibold mb-1">{{ number_format($accommodation ?? 0) }}</h3>
                                            <span class="badge bg-light text-body fw-semibold">Confirmed stays</span>
                              </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                    @endif

                    <div class="col-12">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="fw-semibold mb-0">Company Evaluations</h3>
                            @if (Auth::user()->hasRole('admin'))
                                <span class="badge bg-primary-subtle text-primary fw-semibold">Finance & Operations</span>
                            @endif
                        </div>
                      </div>

                    @if (Auth::user()->hasRole('admin'))
                        <div class="col-xxl-7 col-lg-8">
                            <div class="card shadow-none border h-100">
                                <div class="card-body p-4">
                                    <div class="d-flex flex-column flex-md-row justify-content-between gap-3">
                                        <form method="GET" action="{{ url('/dash') }}" class="row g-2 align-items-end">
                                            <div class="col-md-4">
                                                <label class="form-label mb-1">Year</label>
                                        <select name="year" class="form-control">
                                            <option value="all" {{ $year == 'all' ? 'selected' : '' }}>All Years</option>
                                                    @for ($i = date('Y'); $i >= 2020; $i--)
                                                <option value="{{ $i }}" {{ $i == $year ? 'selected' : '' }}>{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                            <div class="col-md-4">
                                                <label class="form-label mb-1">Month</label>
                                        <select name="month" class="form-control">
                                            <option value="all" {{ $month == 'all' ? 'selected' : '' }}>All Months</option>
                                                    @foreach (range(1, 12) as $m)
                                                <option value="{{ $m }}" {{ $m == $month ? 'selected' : '' }}>
                                                    {{ date('F', mktime(0, 0, 0, $m, 1)) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                            <div class="col-md-4">
                                                <button type="submit" class="btn btn-primary w-100">Apply Filters</button>
                                            </div>
                                        </form>
                                        <div class="text-md-end">
                                            <p class="text-muted mb-0">Filters update the analytics below.</p>
                                        </div>
                                    </div>

                                    <div class="table-responsive mt-4">
                                        <table class="table table-bordered align-middle">
                                            <thead class="table-light">
                                    <tr>
                                                    <th>Metric</th>
                                        <th>Type</th>
                                                    <th class="text-end">Amount (TZS)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                                    <td>Total Collections</td>
                                                    <td>Revenue</td>
                                                    <td class="text-end">{{ number_format($totalCollection) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Allowance Expenses</td>
                                        <td>Expense</td>
                                                    <td class="text-end">{{ number_format($totalAllowance) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Transport Expenses</td>
                                        <td>Expense</td>
                                                    <td class="text-end">{{ number_format($totalTransport) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Accommodation Expenses</td>
                                        <td>Expense</td>
                                                    <td class="text-end">{{ number_format($totalAccommodation) }}</td>
                                    </tr>
                                                <tr class="{{ $profitLoss >= 0 ? 'table-success' : 'table-danger' }}">
                                                    <td class="fw-semibold">Net Profit / Loss</td>
                                        <td></td>
                                                    <td class="fw-semibold text-end {{ $profitLoss >= 0 ? 'text-success' : 'text-danger' }}">
                                                {{ $profitLoss >= 0 ? '+' : '-' }} {{ number_format(abs($profitLoss)) }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                                    </div>
                                </div>
                          </div>
                      </div>

                        <div class="col-xxl-5 col-lg-4">
                            <div class="card shadow-none border h-100">
                                <div class="card-body p-4">
                                    <h5 class="fw-semibold mb-3">Expense Breakdown</h5>
                                    <canvas id="expenseBreakdownChart" height="220"></canvas>
                                    <div class="mt-4">
                                        <h6 class="fw-semibold mb-2">Key Insight</h6>
                                        <p class="text-muted mb-0">
                                            {{ $topExpense }} currently accounts for
                                            {{ $totalExpenses > 0 ? round((($expenseBreakdown[$topExpense] ?? 0) / $totalExpenses) * 100, 1) : 0 }}%
                                            of total expenses. Consider tightening controls if this continues to grow.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                      <div class="col-lg-6">
                            <div class="card shadow-none border h-100">
                                <div class="card-body p-4">
                                    <h5 class="fw-semibold mb-3">Collections vs Expenses</h5>
                                    <canvas id="collectionsVsExpensesChart" height="220"></canvas>
                                    <div class="mt-3">
                                        <p class="text-muted mb-0">Comparing total revenue against combined expenses helps track profitability direction at a glance.</p>
                                    </div>
                                </div>
                            </div>
                                    </div>

                        <div class="col-lg-6">
                            <div class="card shadow-none border h-100">
                                <div class="card-body p-4">
                                    <h5 class="fw-semibold mb-3">Finance Action Items</h5>
                                    <ul class="list-unstyled mb-0">
                                        <li class="d-flex align-items-start mb-3">
                                            <span class="badge bg-light text-primary me-3">1</span>
                                            <div>
                                                <h6 class="fw-semibold mb-1">Review {{ strtolower($topExpense) }} invoices</h6>
                                                <p class="text-muted mb-0">Confirm supporting documents for high-value reimbursements before month end.</p>
                                            </div>
                                        </li>
                                        <li class="d-flex align-items-start mb-3">
                                            <span class="badge bg-light text-primary me-3">2</span>
                                            <div>
                                                <h6 class="fw-semibold mb-1">Balance collections vs payouts</h6>
                                                <p class="text-muted mb-0">Keep net profit above zero by flagging unusually high claims early.</p>
                                            </div>
                                        </li>
                                        <li class="d-flex align-items-start">
                                            <span class="badge bg-light text-primary me-3">3</span>
                                            <div>
                                                <h6 class="fw-semibold mb-1">Coordinate with operations</h6>
                                                <p class="text-muted mb-0">Align offer pipelines with expected expenses to improve forecast accuracy.</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="{{ Auth::user()->hasRole('admin') ? 'col-lg-12' : 'col-lg-6' }}">
                        <div class="card shadow-none border h-100">
                            <div class="card-body p-4">
                                <h5 class="fw-semibold mb-3">Events Pipeline</h5>
                                <div class="row g-3">
                                    <div class="col-md-4 col-sm-6">
                                        <div class="bg-light rounded-3 p-3 h-100">
                                            <p class="text-muted mb-1">Total Events</p>
                                            <h4 class="fw-semibold mb-0">{{ $events }}</h4>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <div class="bg-light rounded-3 p-3 h-100">
                                            <p class="text-muted mb-1">Upcoming Events</p>
                                            <h4 class="fw-semibold mb-0 text-warning">{{ $up_events }}</h4>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <div class="bg-light rounded-3 p-3 h-100">
                                            <p class="text-muted mb-1">Completed Events</p>
                                            <h4 class="fw-semibold mb-0 text-success">{{ $done_events }}</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <p class="text-muted mb-0">Monitor the events pipeline to ensure staffing and logistics remain aligned with demand.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if (! Auth::user()->hasRole('admin'))
                        <div class="col-lg-6">
                            <div class="card shadow-none border h-100">
                                <div class="card-body p-4">
                                    <h5 class="fw-semibold mb-3">Personal Finance Snapshot</h5>
                                    <div class="row g-3">
                                        <div class="col-6">
                                            <div class="bg-light rounded-3 p-3 h-100">
                                                <p class="text-muted mb-1">Allowance Share</p>
                                                <h4 class="fw-semibold mb-0">
                                                    {{ $my_collection > 0 ? round((($allowance ?? 0) / max($my_collection, 1)) * 100, 1) : 0 }}%
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="bg-light rounded-3 p-3 h-100">
                                                <p class="text-muted mb-1">Transport Share</p>
                                                <h4 class="fw-semibold mb-0">
                                                    {{ $my_collection > 0 ? round((($transport ?? 0) / max($my_collection, 1)) * 100, 1) : 0 }}%
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="bg-light rounded-3 p-3 h-100">
                                                <p class="text-muted mb-1">Accommodation Share</p>
                                                <h4 class="fw-semibold mb-0">
                                                    {{ $my_collection > 0 ? round((($accommodation ?? 0) / max($my_collection, 1)) * 100, 1) : 0 }}%
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <p class="text-muted mb-0">Compare your expense mix against allowances to keep personal spending aligned with policy.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

                @if (Auth::user()->hasRole('admin'))
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            const expenseBreakdownCtx = document.getElementById('expenseBreakdownChart');
                            if (expenseBreakdownCtx) {
                                new Chart(expenseBreakdownCtx, {
                                    type: 'doughnut',
                                    data: {
                                        labels: @json(array_keys($expenseBreakdown)),
                                        datasets: [{
                                            data: @json(array_values($expenseBreakdown)),
                                            backgroundColor: ['#5D87FF', '#FFAE1F', '#13DEB9'],
                                            borderWidth: 0,
                                        }],
                                    },
                                    options: {
                                        plugins: {
                                            legend: {
                                                position: 'bottom',
                                            },
                                        },
                                        cutout: '65%',
                                    },
                                });
                            }

                            const collectionsVsExpensesCtx = document.getElementById('collectionsVsExpensesChart');
                            if (collectionsVsExpensesCtx) {
                                new Chart(collectionsVsExpensesCtx, {
                                    type: 'bar',
                                    data: {
                                        labels: ['Collections', 'Total Expenses'],
                                        datasets: [{
                                            label: 'Amount (TZS)',
                                            data: [{{ $totalCollection }}, {{ $totalExpenses }}],
                                            backgroundColor: ['#5D87FF', '#FF5252'],
                                            borderRadius: 8,
                                        }],
                                    },
                                    options: {
                                        plugins: {
                                            legend: {
                                                display: false,
                                            },
                                        },
                                        scales: {
                                            y: {
                                                beginAtZero: true,
                                                ticks: {
                                                    callback: function (value) {
                                                        return new Intl.NumberFormat().format(value);
                                                    },
                                                },
                                            },
                                        },
                                    },
                                });
                            }
                        });
                    </script>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
