@if(session('message'))
<div class="alert alert-primary">
	{{ session('message') }}
</div>
@endif
