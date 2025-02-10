<x-app-layout>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        @include('layouts.aside')
        <div class="body-wrapper">
            @include('layouts.navigation')
            <div class="m-3">
                <div class="row">
                    <!-- Revenue Summary -->
                    <div class="col-lg-3">
                        <!-- Yearly Breakup -->
                        <div class="card overflow-hidden">
                          <div class="card-body p-4">
                            <h5 class="card-title mb-9 fw-semibold">Total Revenue</h5>
                            <div class="row align-items-center">
                              <div class="col-8">
                                <h4 class="fw-semibold mb-3">$36,358</h4>
                                <div class="d-flex align-items-center mb-3">
                                  <span
                                    class="me-1 rounded-circle bg-light-success round-20 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-arrow-up-left text-success"></i>
                                  </span>
                                  <p class="text-dark me-1 fs-3 mb-0">+9%</p>
                                  <p class="fs-3 mb-0">last year</p>
                                </div>
                                <div class="d-flex align-items-center">
                                  <div class="me-4">
                                    <span class="round-8 bg-primary rounded-circle me-2 d-inline-block"></span>
                                    <span class="fs-2">2023</span>
                                  </div>
                                  <div>
                                    <span class="round-8 bg-light-primary rounded-circle me-2 d-inline-block"></span>
                                    <span class="fs-2">2023</span>
                                  </div>
                                </div>
                              </div>
                              <div class="col-4">
                                <div class="d-flex justify-content-end">
                                  <div
                                    class="text-white bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-currency-dollar fs-6"></i>
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
                            <h5 class="card-title mb-9 fw-semibold">Total Expenses</h5>
                            <div class="row align-items-center">
                              <div class="col-8">
                                <h4 class="fw-semibold mb-3">$36,358</h4>
                                <div class="d-flex align-items-center mb-3">
                                  <span
                                    class="me-1 rounded-circle bg-light-success round-20 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-arrow-up-left text-success"></i>
                                  </span>
                                  <p class="text-dark me-1 fs-3 mb-0">+9%</p>
                                  <p class="fs-3 mb-0">last year</p>
                                </div>
                                <div class="d-flex align-items-center">
                                  <div class="me-4">
                                    <span class="round-8 bg-primary rounded-circle me-2 d-inline-block"></span>
                                    <span class="fs-2">2023</span>
                                  </div>
                                  <div>
                                    <span class="round-8 bg-light-primary rounded-circle me-2 d-inline-block"></span>
                                    <span class="fs-2">2023</span>
                                  </div>
                                </div>
                              </div>
                              <div class="col-4">
                                <div class="d-flex justify-content-end">
                                  <div
                                    class="text-white bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-currency-dollar fs-6"></i>
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
                            <h5 class="card-title mb-9 fw-semibold">Net Profit</h5>
                            <div class="row align-items-center">
                              <div class="col-8">
                                <h4 class="fw-semibold mb-3">$36,358</h4>
                                <div class="d-flex align-items-center mb-3">
                                  <span
                                    class="me-1 rounded-circle bg-light-success round-20 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-arrow-up-left text-success"></i>
                                  </span>
                                  <p class="text-dark me-1 fs-3 mb-0">+9%</p>
                                  <p class="fs-3 mb-0">last year</p>
                                </div>
                                <div class="d-flex align-items-center">
                                  <div class="me-4">
                                    <span class="round-8 bg-primary rounded-circle me-2 d-inline-block"></span>
                                    <span class="fs-2">2023</span>
                                  </div>
                                  <div>
                                    <span class="round-8 bg-light-primary rounded-circle me-2 d-inline-block"></span>
                                    <span class="fs-2">2023</span>
                                  </div>
                                </div>
                              </div>
                              <div class="col-4">
                                <div class="d-flex justify-content-end">
                                  <div
                                    class="text-white bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-currency-dollar fs-6"></i>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                 
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Upcoming Events</h5>
                                <h4>5 Events</h4>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Revenue Charts -->
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Revenue Breakdown</h5>
                                <div id="revenue-chart"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Sales Breakdown</h5>
                                <div id="sales-chart"></div>
                            </div>
                        </div>
                    </div>
                </div>
                
               
            </div>
        </div>
    </div>
</x-app-layout>
