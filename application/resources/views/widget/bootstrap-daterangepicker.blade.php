@push('styles')
<link rel="stylesheet" href="{{ plugins('bootstrap-daterangepicker/daterangepicker-bs3.css') }}">
@endpush


@push('scripts')
<script type="text/javascript" charset="utf-8" src="{{ plugins('bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<script type="text/javascript">
    $.fn.toDateRangePicker = function(options, cb){
        var defaultOptions = {
            "locale":{
                "applyLabel": "Onayla",
                "cancelLabel": "İptal",
                "fromLabel": "Tarihinden",
                "toLabel": "Tarihe",
                "customRangeLabel": "Özel Aralık",
                "daysOfWeek": [ "Pz", "Pzt", "Sal", "Çrş", "Prş", "Cu", "Cts", "Pz" ],
                "monthNames": ["Ocak", "Şubat", "Mart", "Nisan", "Mayıs", "Haziran", "Temmuz", "Ağustos", "Eylül", "Ekim", "Kasım", "Aralık"]
            },
            "format" : "DD/MM/YYYY"
        };

        $.extend(true, defaultOptions, options);

        $(this).daterangepicker(defaultOptions, cb);
    }
</script>
@endpush