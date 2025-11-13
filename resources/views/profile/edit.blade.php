<x-app-layout>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        @include('layouts.aside')

        <div class="body-wrapper">
            @include('layouts.navigation')

            <div class="container-fluid py-4">
                <div class="row">
                    <div class="col-xl-8 col-lg-9 col-md-10 mx-auto">
                        <div class="card shadow-sm mb-4">
                            <div class="card-body">
                                @include('profile.partials.update-profile-information-form')
                            </div>
                        </div>

                        <div class="card shadow-sm mb-4">
                            <div class="card-body">
                                @include('profile.partials.update-password-form')
                            </div>
                        </div>

                        {{-- <div class="card shadow-sm mb-4">
                            <div class="card-body">
                                @include('profile.partials.delete-user-form')
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
