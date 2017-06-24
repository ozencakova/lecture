@push('scripts')
<script type="text/javascript" charset="utf-8" src="{{ plugins('jquery-input-mask/jquery.inputmask.js') }}"></script>
<script type="text/javascript" charset="utf-8" src="{{ plugins('jquery-input-mask/jquery.inputmask.extensions.js') }}"></script>
<script type="text/javascript" charset="utf-8" src="{{ plugins('jquery-input-mask/jquery.inputmask.date.extensions.js') }}"></script>
<script type='text/javascript'>
    $(function(){
        $("[data-mask]").inputmask();
    });

</script>
@endpush