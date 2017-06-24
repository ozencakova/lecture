@push('styles')
    <link rel="stylesheet" href="{{ plugins('treant/Treant.css') }}">
    <link rel="stylesheet" href="{{ plugins('treant/basic-example.css') }}">
    <link rel="stylesheet" href="{{ plugins('treant/perfect-scrollbar.min.css') }}">
@endpush

@push('scripts')
    <script type="text/javascript" src="{{ plugins('treant/raphael.js') }}"></script>
    <script type="text/javascript" src="{{ plugins('treant/Treant.js') }}"></script>
    <script type="text/javascript" src="{{ plugins('treant/perfect-scrollbar.jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ plugins('treant/perfect-scrollbar.min.js') }}"></script>
@endpush