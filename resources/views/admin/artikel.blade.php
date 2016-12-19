@extends('admin.layout')

@section('htmlheader_title')
	Artikel
@endsection

@section('contentheader_title')
	Artikel
@endsection

@section('breadcumb')
	Artikel
@endsection

@push('css')
	<!-- DataTables -->
	<link rel="stylesheet" href="{{ asset('adminpage/plugins/datatables/dataTables.bootstrap.css') }}" type="text/css">
@endpush

@section('main-content')
			<div class="row">
        <div class="col-xs-12">
					@if(Session::has('simpan'))
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

					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<i class="icon fa fa-ban"></i><strong>Ooops!</strong> Terjadi kesalahan saat input data.
							<ul>
	                @foreach ($errors->all() as $error)
	                    <li>{{ $error }}</li>
	                @endforeach
	            </ul>
						</div>
					@endif

					<div class="box">
            <div class="box-header">
							<a href="/admin-artikel/create" class="btn btn-success">Tambah</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
									<th width=5%> No.</th>
                  <th class="col-md-3">Judul</th>
                  <th class="col-md-1">Kategori</th>
                  <th class="col-md-4">Deskripsi</th>
                  <th width=9%>Action</th>
                </tr>
                </thead>
                <tbody>

									@foreach($artikel as $articles)
	                <tr>
										<td class="text-center">{{$loop->iteration}}</td>
	                  <td>{{ $articles->judul }}</td>
	                  <td>{{ $articles->kategori->nama }}</td>
	                  <td>{!! str_limit($articles->deskripsi, 70) !!}</td>
	                  <td class="text-center">
											<a href="#lihatartikel{{ $articles->id }}" data-toggle="modal" class="btn btn-info btn-xs"><span class="fa fa-eye"></span></a>
											<a href="/admin-artikel/{{ $articles->id }}/edit" class="btn btn-success btn-xs"><span class="fa fa-edit"></span></a>
											<a href="#hapusartikel{{ $articles->id }}" data-toggle="modal" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a>
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


			@foreach ($artikel as $articles)
			<div class="modal fade" id="lihatartikel{{ $articles->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h3>{{ $articles->judul }}</h3>
						</div>
						<div class="modal-body">
							<div class="form-horizontal">
								<div class="form-group">
									<div class="row">
										<div class="col-sm-6 col-sm-offset-3 col-md-8 col-md-offset-2">
											<img src="{{ asset('img/artikel/big/' . $articles->gambar) }}" alt="img" class="img-responsive" />
										</div>
									</div><br>

									<label class="col-md-3" align="right">Kategori	:</label>
									<div class="col-md-9">
										<p>{{ $articles->kategori->nama }}</p>
									</div>

									<label class="col-md-3" align="right">Deskripsi	:</label>
									<div class="col-md-7">
										{!! $articles->deskripsi !!}
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			@endforeach

			@foreach ($artikel as $articles)
        <div class="modal modal-danger fade" id="hapusartikel{{ $articles->id }}" >
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center">Hapus Artikel</h4>
              </div>
              <div class="modal-body text-center">
                <p>Anda yakin akan menghapus</p>
								<p>"{{$articles->judul}}"</p>
              </div>
              <div class="modal-footer">
								<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
								<form action="admin-artikel/{{ $articles->id }}" method="post">
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
