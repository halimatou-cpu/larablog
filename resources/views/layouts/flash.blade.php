
@if ($message = Session::get('success'))
	<div class="alert alert-success alert-dismissible fade show" role="alert">
		<strong>{{ $message }}</strong>
		<button type="button" class="close" data-bs-dismiss="alert"><i class="fas fa-times"></i></button>
	</div>
@endif

@if ($message = Session::get('warning'))
	<div class="alert alert-warning alert-dismissible fade show" role="alert">
		<strong>{{ $message }}</strong>
		<button type="button" class="close" data-bs-dismiss="alert"><i class="fas fa-times"></i></button>
	</div>
@endif
