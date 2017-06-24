@push('scripts')
<script src="{{ plugins('flot/jquery.flot.min.js') }}"></script>
<script src="{{ plugins('flot/jquery.flot.pie.min.js') }}"></script>
<script>
    function labelFormatter(label, series) {
        return '<div style="font-size:18px; text-align:center; padding:5px 10px; color: #000; font-weight: 700;">'
                + Math.round(series.data[0][1]) + "</div>";
    }
</script>
@endpush