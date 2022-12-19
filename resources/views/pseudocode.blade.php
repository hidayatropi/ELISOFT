@extends('layouts.layouts')

@section('content')
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Pseudocode Mengubah Angka</h3>
			</div>

			<div class="card-body">
				<form action="{{route('searchangka')}}" method="POST">
					{{@csrf_field()}}
					<div class="input-group input-group-sm">
						<input type="text" name="text" autocomplete="off" id="text" class="form-control" id="email" placeholder="Masukan Angka" autofocus onkeypress="return hanyaAngka(event)" value="{{$number}}">
						<span class="input-group-append">
							<button type="submit" class="btn btn-info btn-flat">Go!</button>
						</span>
					</div>
					<br>
					<div class="form-group input-group-sm">
						{{-- <label>Terbilang {{$print}}</label> --}}
						<input type="text" disabled class="form-control" style="color:bold;" placeholder="Terbilang : {{Str::upper($in_words)}}">
					</div>
				</form>
			</div>
		</div>
		
	</div>
</div>
@endsection

@section('js')
<script>
	function hanyaAngka(evt) {
		var charCode = (evt.which) ? evt.which : event.keyCode
		if (charCode > 31 && (charCode < 48 || charCode > 57))
		return false;
		return true;
	}
</script>
@endsection