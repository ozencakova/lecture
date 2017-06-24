@if ($errors->any())
<div class="alert alert-danger" style="margin-top:10px;">
	{!! implode('<br>', $errors->all(':message')) !!}
</div>
@endif
@if (session('success_message'))
<div class="alert alert-success" style="margin-top:10px;">
	@if(is_array(session('success_message')))
		{!! implode('<br>', session('success_message')) !!}
	@else
		{{ session('success_message') }}
	@endif
</div>
@endif