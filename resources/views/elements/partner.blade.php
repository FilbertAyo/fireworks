<div class="container-xxl mt-5">
    <div class="text-center">
        <h1 class="mb-1">Clients</h1>
        <p>People & Companies We've Worked With</p>
    </div>

    <div class="row">
        @foreach($partners as $partner)
        <div class="col-2 col-md-1 d-flex justify-content-center rounded-0">
                <div class="text-center partner-logo-box">
                    <img src="{{ asset($partner->logo) }}" alt="{{ $partner->name }}" class="img-fluid partner-logo">
                    {{-- <p class="mt-2 mb-0 small text-dark">{{ $partner->name }}</p> --}}
                </div>
            </div>
        @endforeach
    </div>
</div>
<style>
    .partner-logo {
        width: 100%;
        height: 60px;
        object-fit: contain;
        display: block;
        margin: 0 auto;
    }
    </style>
