@push('styles')
    <link rel='stylesheet' href='{{ plugins('select2/select2.min.css') }}'>
@endpush

@push('scripts')
    <script type='text/javascript' src='{{ plugins('select2/select2.full.min.js') }}'></script>
    <script type='text/javascript' src='{{ plugins('select2/i18n/tr.js') }}'></script>
    <script type='text/javascript'>
        $.fn.toSelect2 = function(options){
            var defaultOptions = {
                language: 'tr',
                minimumResultsForSearch: 10
            };

            $.extend(true, defaultOptions, options);

            $(this).select2(defaultOptions);
        }
    </script>
@endpush