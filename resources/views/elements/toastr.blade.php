
<link rel="stylesheet" href="{{ asset('toastr/css/toastr.min.css') }}">

@if (session('success'))
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            toastr.success("{{ session('success') }}", "Done", {
                    positionClass: "toast-top-right",
                    timeOut: 5e3,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1
                })

        });
    </script>
@elseif (session('error'))
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            toastr.error("{{ session('error') }}", "Error!", {
                    positionClass: "toast-top-right",
                    timeOut: 5e3,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1
                })
        });
    </script>
@endif


@if ($errors->any())

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            @foreach ($errors->all() as $error)
            toastr.error("{{ $error }}", "Error!", {
                    positionClass: "toast-top-right",
                    timeOut: 5e3,
                    closeButton: !0,
                    debug: !1,
                    newestOnTop: !0,
                    progressBar: !0,
                    preventDuplicates: !0,
                    onclick: null,
                    showDuration: "300",
                    hideDuration: "1000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                    tapToDismiss: !1
                });
                @endforeach

        });
    </script>
@endif


<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.body.addEventListener("click", function (event) {
            if (event.target.matches(".permission-alert")) {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "You don't have permission to perform this action!",
                });
            }
        });
    });
</script>


{{-- delete --}}
<script>
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: "btn btn-success ml-2", // Added 'ml-2' for spacing
            cancelButton: "btn btn-danger"
        },
        buttonsStyling: false
    });

    function showSweetAlert(event, itemId) {
        event.preventDefault(); // Prevent the form from submitting immediately

        swalWithBootstrapButtons.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                // Submit the form programmatically
                document.getElementById(`deleteForm-${itemId}`).submit();
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                swalWithBootstrapButtons.fire({
                    title: "Cancelled",
                    text: "Your application is safe :)",
                    icon: "error"
                });
            }
        });

        return false;
    }
</script>




<script src="{{ asset('toastr/global.min.js') }}"></script>
<script src="{{ asset('toastr/quixnav-init.js') }}"></script>
<script src="{{ asset('toastr/toastr.min.js') }}"></script>
<script src="{{ asset('toastr/toastr-init.js') }}"></script>
