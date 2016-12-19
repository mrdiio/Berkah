@extends('admin.layout')

@section('htmlheader_title')
	Slideshow
@endsection

@section('contentheader_title')
	Slideshow
@endsection

@section('breadcumb')
	Slideshow
@endsection

@push('css')
	<!-- Fancybox slider -->
	<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/jquery.fancybox.css') }}">
	<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('adminpage/css/gallery-style.css') }}">
	<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('adminpage/css/gallery-style-theme.css') }}">
	<!-- Theme color -->
  <link id="switcher" rel="stylesheet" href="{{ asset('css/theme-color/red-theme.css') }}">
@endpush

@section('main-content')
			<div class="row">
        <div class="col-md-12">
					@if(Session::has('simpan'))
						<div class="alert alert-success fade in" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<i class="icon fa fa-check"></i><strong>Sukses!</strong> Pembaruan berhasil.
						</div>
					@endif
					@if(Session::has('hapus'))
						<div class="alert alert-danger fade in" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<i class="icon fa fa-check"></i><strong>Sukses!</strong> Data Berhasil Dihapus.
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

					<div class="box box-danger">
						<div class="box-header">
							<a href="#tambahjenis" data-toggle="modal" class="btn btn-success">Tambah</a>
						</div>
						<!-- /.box-header -->

						<div class="box-body">
							<div class="col-md-4 table-responsive no-padding">
			          <table class="table table-hover table-bordered">
			            <tr>
			              <th style="width:15px" class="text-center">No.</th>
			              <th>Nama Jenis Properti</th>
			              <th class="text-center" style="width:100px">Aksi</th>
			            </tr>
									@foreach ($type as $jenis)
			            <tr>
			              <td class="text-center">{{ $loop->iteration }}</td>
			              <td>{{ $jenis->nama }}</td>
			              <td class="text-center">
											<a href="#editjenis{{ $jenis->id }}" data-toggle="modal" class="btn btn-success btn-xs"><span class="fa fa-edit"></span></a>
											<a href="#hapusjenis{{ $jenis->id }}" data-toggle="modal" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a>
										</td>
			            </tr>
									@endforeach
			          </table>
		        	</div>
						</div>
						<!-- /.box-body -->
					</div>
					<!-- /.box -->
				</div>
			</div>

			<!-- tambah jenis -->
			<div class="modal fade" id="tambahjenis" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">Edit Jenis Properti</h4>
						</div>
						<div class="modal-body">
							<!-- Horizontal Form -->
								<!-- form start -->
								<form role="form" method="POST" action="/admin-jenis">
									{{ csrf_field() }}
									<div class="box-body">
										<div class="form-group{{ $errors->has('jenis') ? ' has-error' : '' }}">
											<label>Nama Jenis Properti</label>
											<input type="text" class="form-control" name="jenis" placeholder="Nama Jenis Properti" value="">
										</div>

										<div class="box-footer">
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
											<button type="submit" class="btn btn-success pull-right">
													Submit
											</button>
										</div>
									</div>
									<!-- /.box-body -->
								</form>

						</div>
					</div>
				</div>
			</div>

			<!-- edit gambar -->
			@foreach($type as $edit)
			<div class="modal fade" id="editjenis{{ $edit->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">Edit Jenis Properti</h4>
						</div>
						<div class="modal-body">
							<!-- Horizontal Form -->
								<!-- form start -->
								<form role="form" method="POST" action="/admin-jenis/{{ $edit->id }}">
									{{ method_field('PUT') }}
									{{ csrf_field() }}
									<div class="box-body">
										<div class="form-group{{ $errors->has('jenis') ? ' has-error' : '' }}">
											<label>Nama Jenis Properti</label>
											<input type="text" class="form-control" name="jenis" placeholder="Nama Jenis Properti" value="{{ $edit->nama }}">
										</div>

										<div class="box-footer">
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
											<button type="submit" class="btn btn-success pull-right">
													Submit
											</button>
										</div>
									</div>
									<!-- /.box-body -->
								</form>

						</div>
					</div>
				</div>
			</div>
			@endforeach

			@foreach ($type as $hapus)
        <div class="modal modal-danger fade" id="hapusjenis{{ $hapus->id }}" >
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center">Hapus Artikel</h4>
              </div>
              <div class="modal-body text-center">
                <p>Anda yakin akan menghapus</p>
								<p>"{{$hapus->nama}}"</p>
              </div>
              <div class="modal-footer">
								<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
								<form action="admin-jenis/{{ $hapus->id }}" method="post">
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
	<!-- Slick slider -->
	<script type="text/javascript" src="{{ asset('js/slick.js') }}"></script>
	<!-- Counter -->
	<script type="text/javascript" src="{{ asset('js/waypoints.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/jquery.counterup.js') }}"></script>
	<!-- Mixit slider -->
	<script type="text/javascript" src="{{ asset('js/jquery.mixitup.js') }}"></script>
	<!-- Add fancyBox -->
	<script type="text/javascript" src="{{ asset('js/jquery.fancybox.pack.js') }}"></script>
	<!-- Custom js -->
	<script src="{{ asset('js/custom.js') }}"></script>
@endpush
