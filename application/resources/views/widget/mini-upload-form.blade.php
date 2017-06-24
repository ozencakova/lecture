@push('styles')
<link rel="stylesheet" href="{{ plugins('mini-upload-form/css/mini-upload-form.css') }}">

@endpush

@push('scripts')
<script type="text/javascript" charset="utf-8" src="{{ plugins('mini-upload-form/js/jquery.knob.js') }}"></script>
<script type="text/javascript" charset="utf-8" src="{{ plugins('mini-upload-form/js/jquery.ui.widget.js') }}"></script>
<script type="text/javascript" charset="utf-8" src="{{ plugins('mini-upload-form/js/jquery.iframe-transport.js') }}"></script>
<script type="text/javascript" charset="utf-8" src="{{ plugins('mini-upload-form/js/jquery.fileupload.js') }}"></script>
<script type="text/javascript" charset="utf-8" src="{{ plugins('mini-upload-form/js/mini-upload-form.js') }}"></script>
@endpush