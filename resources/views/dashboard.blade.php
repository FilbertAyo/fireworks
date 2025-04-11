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
                                        <h4 class="fw-semibold mb-3">{{ number_format($transport ?? '0') }}</h4>
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
                                        <h4 class="fw-semibold mb-3">{{ number_format($accommodation ?? '0') }}</h4>

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

                    <div class="col-4">
                        <div class="card p-3">
                            <form method="GET" action="{{ url('/dash') }}" class="mb-3">
                                <div class="row">
                                    <div class="col-md-5">
                                        <select name="year" class="form-control">
                                            <option value="all" {{ $year == 'all' ? 'selected' : '' }}>All Years
                                            </option>
                                            @for ($i = date('Y'); $i >= 2020; $i--)
                                                <option value="{{ $i }}" {{ $i == $year ? 'selected' : '' }}>
                                                    {{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="col-md-5">
                                        <select name="month" class="form-control">
                                            <option value="all" {{ $month == 'all' ? 'selected' : '' }}>All Months
                                            </option>
                                            @foreach (range(1, 12) as $m)
                                                <option value="{{ $m }}"
                                                    {{ $m == $month ? 'selected' : '' }}>
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
                                        <td>Fireworks collections</td>
                                        <td>Income</td>
                                        <td>{{ number_format($totalCollection) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Operation</td>
                                        <td>Income</td>
                                        <td>{{ number_format($totalOperation) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Contract</td>
                                        <td>Income</td>
                                        <td>{{ number_format($totalContract) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Allowance</td>
                                        <td>Expense</td>
                                        <td>{{ number_format($totalAllowance) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Transport</td>
                                        <td>Expense</td>
                                        <td>{{ number_format($totalTransport) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Accommodation</td>
                                        <td>Expense</td>
                                        <td>{{ number_format($totalAccommodation) }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Profit/Loss</strong></td>
                                        <td></td>
                                        <td>
                                            <strong class="{{ $profitLoss >= 0 ? 'text-success' : 'text-danger' }}">
                                                {{ $profitLoss >= 0 ? '+' : '-' }}
                                                {{ number_format(abs($profitLoss)) }}
                                            </strong>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>


                    <div class="col-8">
                        <div class="card">
                            <div class="row">
                                <div class="col-4">
                                    <div class="card-body">
                                        <h6>Total Events</h6>
                                        <h4>{{ $events }}</h4>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="card-body">
                                        <h6 class="text-warning">Upcoming Events</h6>
                                        <h4 class="text-warning">{{ $up_events }} </h4>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="card-body">
                                        <h6 class="text-success">Events Done</h6>
                                        <h4 class="text-success">{{ $done_events }} </h4>
                                    </div>
                                </div>
                            </div>
                        </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="card p-3">
                                    <canvas id="incomeExpenseChart" height="450"></canvas>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="card p-3">
                                    <canvas id="expensePieChart"></canvas>
                                    </div>
                                </div>
                            </div>


                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('incomeExpenseChart').getContext('2d');
        const incomeExpenseChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Fireworks', 'Operation', 'Contract', 'Allowance', 'Transport', 'Accommodation'],
                datasets: [{
                        label: 'Income (TZS)',
                        data: [
                            {{ $totalCollection }},
                            {{ $totalOperation }},
                            {{ $totalContract }},
                            0,
                            0,
                            0
                        ],
                        backgroundColor: 'rgba(54, 162, 235, 0.6)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Expense (TZS)',
                        data: [
                            0,
                            0,
                            0,
                            {{ $totalAllowance }},
                            {{ $totalTransport }},
                            {{ $totalAccommodation }}
                        ],
                        backgroundColor: 'rgba(255, 99, 132, 0.6)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    }
                ]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return value.toLocaleString();
                            }
                        }
                    }
                }
            }
        });
    </script>

<script>
    const pieCtx = document.getElementById('expensePieChart').getContext('2d');
    const expensePieChart = new Chart(pieCtx, {
        type: 'pie',
        data: {
            labels: ['Allowance', 'Transport', 'Accommodation'],
            datasets: [{
                label: 'Expenses',
                data: [
                    {{ $totalAllowance }},
                    {{ $totalTransport }},
                    {{ $totalAccommodation }}
                ],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.6)',
                    'rgba(255, 206, 86, 0.6)',
                    'rgba(54, 162, 235, 0.6)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(54, 162, 235, 0.6)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom'
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            const value = context.raw.toLocaleString();
                            return `${context.label}: TZS ${value}`;
                        }
                    }
                }
            }
        }
    });
</script>




</x-app-layout>
