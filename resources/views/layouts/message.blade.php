@if ($message = Session::get('warning'))
	<div class="alert alert-warning alert-dismissible fade show" role="alert">
		<strong>Perhatian!</strong> {{ $message }}
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
@endif
@if ($message = Session::get('failed'))
	<div class="alert alert-danger alert-dismissible fade show" role="alert">
		<strong>Perhatian!</strong> {{ $message }}
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
@endif
@if ($message = Session::get('success'))
	
	<div class="alert alert-success alert-dismissible fade show" role="alert">
		<strong>Perhatian!</strong> {{ $message }}
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
@endif