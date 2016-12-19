@extends('admin.layout')

@section('htmlheader_title')
	Galeri
@endsection

@section('contentheader_title')
	Galeri
@endsection

@section('breadcumb')
	Galeri
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
							<button href="#tambahgambar" data-toggle="modal" type="submit" class="btn btn-primary">Tambah Gambar</button>
            </div>
            <!-- /.box-header -->
						<!-- start single gallery image -->
						<div class="box-body">
							<div class="row">
								@foreach ($galeri as $gallery)
								<div class="col-md-4 col-sm-6 col-xs-6 mix library">
	                <div class="mu-single-gallery">
	                  <div class="mu-single-gallery-item">
	                    <div class="mu-single-gallery-img">
	                      <a href="#"><img alt="img" src="{{ asset('img/gallery/small/' . $gallery->gambar) }}"></a>
	                    </div>
	                    <div class="mu-single-gallery-info">
	                      <div class="mu-single-gallery-info-inner">
													<h4>{{ ucwords($gallery->judul) }}</h4>
													<p>{{ ucwords($gallery->filter->nama) }}</p>
	                        <a href="{{ asset('img/gallery/big/' . $gallery->gambar) }}" data-fancybox-group="gallery" class="fancybox"><span class="fa fa-eye"></span></a>
													<a href="#editgambar{{ $gallery->id }}" data-toggle="modal"><span class="fa fa-edit"></span></a>
													<a href="#hapusgambar{{ $gallery->id }}" data-toggle="modal"><span class="fa fa-trash"></span></a>
	                      </div>
	                    </div>
	                  </div>
	                </div>
								</div>
								@endforeach
							</div>
							{{ $galeri->links() }}
						</div>
            <!-- /.box-body -->
          </div>
				</div>
			</div>

			<!-- tambah gambar -->
			<div class="modal fade" id="tambahgambar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">Tambah Gambar</h4>
						</div>
						<div class="modal-body">
							<!-- Horizontal Form -->
								<!-- form start -->
								<form enctype="multipart/form-data" class="form-horizontal" role="form" method="POST" action="/admin-galeri">{{ csrf_field() }}
									<div class="box-body">

										<div class="form-group{{ $errors->has('judul') ? ' has-error' : '' }}">
											<div class="col-sm-12">
												<input type="text" class="form-control" name="judul" placeholder="Judul Gambar">
											</div>
										</div>

										<div class="form-group{{ $errors->has('gambar') ? ' has-error' : '' }}">
											<div class="col-sm-12">
												<input type="file" class="form-control" name="gambar">
												<span class="help-block pull-right"><i>*Ukuran Gambar Maksimal 1920 x 1080</i></span>
											</div>
										</div>

										<div class="form-group{{ $errors->has('filter') ? ' has-error' : '' }}">
											<div class="col-md-12">
				                <select class="form-control" name="filter">
				                  <option value="">Pilih Satu Filter</option>
													@foreach ($filter as $filters)
				                  <option value="{{ $filters->id }}">{{ ucwords($filters->nama) }}</option>
													@endforeach
				                </select>
												@if ($errors->has('kategori'))
														<span class="help-block has-error">
																<label class="control-label"><i class="fa fa-times-circle-o"></i>
																	{{ $errors->first('kategori') }}
																</label>
														</span>
												@endif
											</div>
		                </div>
									<!-- /.box-body -->

										<div class="box-footer">
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
											<button type="submit" class="btn btn-success pull-right">
													Submit
											</button>
										</div>
									</div>
								</form>

						</div>
					</div>
				</div>
			</div>

			<!-- edit gambar -->
			@foreach($galeri as $edit)
			<div class="modal fade" id="editgambar{{ $edit->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">Edit Gambar</h4>
						</div>
						<div class="modal-body">
							<!-- Horizontal Form -->
								<!-- form start -->
								<form enctype="multipart/form-data" class="form-horizontal" role="form" method="POST" action="/admin-galeri/{{ $edit->id }}">
									{{ method_field('PUT') }}
									{{ csrf_field() }}
									<div class="box-body">
										<div class="form-group{{ $errors->has('judul') ? ' has-error' : '' }}">
											<div class="col-sm-12">
												<input type="text" class="form-control" name="judul" placeholder="Judul Gambar" value="{{ $edit->judul }}">
													@if ($errors->has('judul'))
															<span class="help-block">
																	<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
																			{{ $errors->first('judul') }}
																	</label>
															</span>
													@endif
											</div>
										</div>

										<div class="form-group{{ $errors->has('gambar') ? ' has-error' : '' }}">
											<div class="col-sm-12">
												<input type="file" accept="image/*" class="form-control" name="gambar">
													@if ($errors->has('gambar'))
															<span class="help-block">
																	<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
																			{{ $errors->first('gambar') }}
																	</label>
															</span>
													@endif
											</div>
										</div>

										<div class="form-group{{ $errors->has('filter') ? ' has-error' : '' }}">
											<div class="col-md-12">
				                <select class="form-control" name="filter">
				                  <option value="">Pilih Satu Filter</option>
													@foreach ($filter as $filters)
				                  <option value="{{ $filters->id }}" {{ $edit->filter_id == $filters->id ? 'selected':'' }}>{{ ucwords($filters->nama) }}</option>
													@endforeach
				                </select>
												@if ($errors->has('kategori'))
														<span class="help-block has-error">
																<label class="control-label"><i class="fa fa-times-circle-o"></i>
																	{{ $errors->first('kategori') }}
																</label>
														</span>
												@endif
											</div>
		                </div>
									<!-- /.box-body -->

										<div class="box-footer">
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
											<button type="submit" class="btn btn-success pull-right">
													Submit
											</button>
										</div>
									</div>
								</form>

						</div>
					</div>
				</div>
			</div>
			@endforeach

			<!-- modal hapus -->
			@foreach ($galeri as $hapus)
        <div class="modal modal-danger fade" id="hapusgambar{{ $hapus->id }}" >
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center">Hapus Artikel</h4>
              </div>
              <div class="modal-body text-center">
                <p>Anda yakin akan menghapus</p>
								<p>"{{$hapus->judul}}"</p>
              </div>
              <div class="modal-footer">
								<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
								<form action="admin-galeri/{{ $hapus->id }}" method="post">
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

	<script>
   $(document).ready(function () {
      var hash = window.location.hash;
      if (hash == "#tambah") {
         $('#tambahgambar').modal();
      }
   });
</script>

@endpush
