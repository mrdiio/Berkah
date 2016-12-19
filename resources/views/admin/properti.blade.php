@extends('admin.layout')

@section('htmlheader_title')
	Properti
@endsection

@section('contentheader_title')
	Properti
@endsection

@section('breadcumb')
	Properti
@endsection

@push('css')
	<!-- DataTables -->
	<link rel="stylesheet" href="{{ asset('adminpage/plugins/datatables/dataTables.bootstrap.css') }}" type="text/css">
@endpush

@section('main-content')
			<div class="row">
        <div class="col-xs-12">
					@if(Session::has('pesan'))
						<div class="alert alert-success fade in" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<i class="icon fa fa-check"></i><strong>Sukses!</strong> Pembaruan berhasil.
						</div>
					@endif
					@if(Session::has('hapus'))
						<div class="alert alert-danger fade in" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<i class="icon fa fa-check"></i><strong>Sukses!</strong> Data Berhasil di Hapus.
						</div>
					@endif
					<div class="box">
            <div class="box-header">
							<a href="/admin-properti/create" class="btn btn-success">Tambah</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
									<th width=3%> No.</th>
                  <th class="col-md-4">Judul</th>
                  <th class="col-md-3">Alamat</th>
                  <th class="col-md-1">Jenis</th>
                  <th class="col-md-2">Harga (Rp)</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
								@foreach($properti as $properties)
                <tr>
									<td class="text-center">{{$loop->iteration}}</td>
                  <td>{{ str_limit($properties->judul,40) }}</td>
                  <td>{{ str_limit($properties->alamat,35) }}</td>
                  <td>{{ $properties->jenis->nama }}</td>
                  <td>{{ number_format("$properties->harga",2,",",".") }}</td>
                  <td class="text-center">
										<a href="#viewproperties{{ $properties->id }}" data-toggle="modal" class="btn btn-info btn-xs"><span class="fa fa-eye"></span></a>
										<a href="/admin-properti/{{ $properties->id }}/edit" class="btn btn-success btn-xs"><span class="fa fa-edit"></span></a>
										<a href="#hapusproperties{{ $properties->id }}" data-toggle="modal" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a>
									</td>
                </tr>
								@endforeach
							</tbody>
						</table >
					</div>
            <!-- /.box-body -->
          </div>
				</div>
			</div>


			@foreach ($properti as $properties)
			<div class="modal fade" id="viewproperties{{ $properties->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h3>{{ $properties->judul }}</h3>
						</div>
						<div class="modal-body">
							<div class="form-horizontal">
								<div class="form-group">
									<div class="row">
										<div class="col-md-8 col-md-offset-2">
											<img src="{{ asset('img/properti/big/' . $properties->gambar) }}" alt="img" class="img-responsive" />
										</div>
									</div><br>

									<label class="col-sm-3 col-md-2" align="right">Jenis	:</label>
									<div class="col-sm-9 col-md-3">
										<p>{{ $properties->jenis->nama }}</p>
									</div>

									<label class="col-sm-3 col-md-1" align="right">Luas	:</label>
									<div class="col-sm-9 col-md-6">
										<p>{{ $properties->luas }}</p>
									</div>

									<label class="col-sm-3 col-md-2" align="right">Sertifikat	:</label>
									<div class="col-sm-9 col-md-3">
										<p>{{ $properties->sertifikat }}</p>
									</div>

									<label class="col-sm-3 col-md-1" align="right">Harga	:</label>
									<div class="col-sm-9 col-md-6">
										<p>Rp {{ number_format("$properties->harga",2,",",".") }}</p>
									</div>

									<label class="col-sm-3 col-md-2" align="right">Alamat	:</label>
									<div class="col-sm-9 col-md-9">
										<p>{{ $properties->alamat }}</p>
									</div>

									<label class="col-sm-3 col-md-2" align="right">Deskripsi	:</label>
									<div class="col-sm-9 col-md-9">
										{!! $properties->deskripsi !!}
									</div>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			@endforeach

			@foreach ($properti as $properties)
        <div class="modal modal-danger fade" id="hapusproperties{{ $properties->id }}" >
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center">Hapus Properti</h4>
              </div>
              <div class="modal-body text-center">
                <p>Anda yakin akan menghapus</p>
								<p>"{{$properties->judul}}"</p>
              </div>
              <div class="modal-footer">
								<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
								<form action="admin-properti/{{ $properties->id }}" method="post">
									{{ method_field('DELETE') }}
									{{ csrf_field() }}
	                <button type="submit" class="btn btn-outline">Hapus</button>
								</form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
			@endforeach
@endsection

@push('js')
	<!-- DataTables -->
	<script src="{{ asset('adminpage/plugins/datatables/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('adminpage/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
	<script>
	$(function () {
		$("#example1").DataTable();
		$('#example2').DataTable({
			"paging": true,
			"lengthChange": false,
			"searching": false,
			"ordering": true,
			"info": true,
			"autoWidth": false
		});
	});
	</script>
@endpush
