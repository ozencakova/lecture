@push('styles')
<link rel="stylesheet" href="{{ plugins('bootstrap-datepicker/datepicker3.css') }}">
@endpush


@push('scripts')
<script type="text/javascript" charset="utf-8" src="{{ plugins('bootstrap-datepicker/bootstrap-datepicker.js') }}"></script>
<script type="text/javascript" charset="utf-8" src="{{ plugins('bootstrap-datepicker/locales/bootstrap-datepicker.tr.js') }}"></script>
<script type="text/javascript">
    $(function(){
        $.fn.datepicker.defaults.format = "dd/mm/yyyy";
    });
</script>
@endpush