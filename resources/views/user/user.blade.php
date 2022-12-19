@extends('layouts.layouts')

@section('content')
<div class="row">
	<div class="col-12">
		<div class="card">
            @include('layouts.message')
			<div class="card-header">
				<h3 class="card-title">Data Users</h3>
				<a href="#" class="btn btn-success btn-sm float-right" data-toggle="modal" data-target="#myModalAdd"><i class="fas fa-plus"></i> TAMBAH </a>
			</div>

			<div class="card-body">
				<table id="example2" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>No</th>
							<th>Name</th>
							<th>Email</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($user as $key => $value)
						<tr>
							<td>{{$loop->iteration}}</td>
							<td>{{$value->name}}</td>
							<td>{{$value->email}}</td>
							<td>
								<button type="button" class="btn btn-info waves-effect btn-sm waves-light" data-toggle="modal" data-target="#myModal{{$value->id}}"><i class="fas fa-edit"></i></button>
								<a href="#" class="btn btn-danger btn-sm delete" users="{{$value->id}}" name="{{$value->name}}">
									<i class="fas fa-trash"></i>
								</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<div id="myModalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">Add Data User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="formip" action="{{route('saveuser')}}" method="post">
                    {{@csrf_field()}}
                    <p>
                    	
                    	<label>Name</label>
                      <input id="name" name="name" type="text" class="form-control" autofocus="on" placeholder="Input Name">
                    	<label>Email</label>
                      <input id="email" name="email" type="text" class="form-control" placeholder="Input Email">
                      <label>Password</label>
                      <input id="password" name="password" type="password" class="form-control" placeholder="Input Password">
                    </p>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light updateip">Save</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

@foreach($user as $key => $values)
<div id="myModal{{$values->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">Update Data User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="formip" action="{{route('storeuser')}}" method="post">
                    {{@csrf_field()}}
                    <p>
                    	<input type="hidden" name="id" value="{{$values->id}}">
                    	<label>Name</label>
                        <input id="name" name="name" type="text" class="form-control" autocomplete="off" value="{{$values->name}}">
                        <input type="hidden" name="id" value="{{$values->id}}">
                    	<label>Email</label>
                        <input id="email" name="email" type="text" class="form-control" autocomplete="off" value="{{$values->email}}">
                      <label>Password</label>
                      <input id="password" name="password_old" type="hidden" class="form-control" value="{{$values->password}}">
                      <input id="password" name="password" type="password" class="form-control" placeholder="Input New Password">
                    </p>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light updateip">Update</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endforeach
@endsection

@section('js')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });

    $('.delete').click(function(){
        var users = $(this).attr('users');
        var name = $(this).attr('name');
        swal({
            title: "Anda Yakin Akan Hapus Data "+name,
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            console.log(willDelete);
            if (willDelete) {
                window.location = "{{url('/')}}/destroyuser/"+users;

            }
        });
    });
</script>
@endsection