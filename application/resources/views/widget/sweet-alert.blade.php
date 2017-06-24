@push('styles')
    <link rel="stylesheet" href="{{ plugins('sweet-alert/sweetalert.css') }}">
@endpush

@push('scripts')
    <script type="text/javascript" charset="utf-8" src="{{ plugins('sweet-alert/sweetalert.min.js') }}"></script>
    <script type="text/javascript">
        swal.setDefaults({
            confirmButtonText: "Tamam",
            cancelButtonText: "İptal"
        });
    </script>
@endpush