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
        <div class="col-xs-12">
					@if(Session::has('update'))
						<div class="alert alert-success fade in" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<i class="icon fa fa-check"></i><strong>Sukses!</strong> Pembaruan berhasil.
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


				</div>
			</div>

			<div class="box box-danger">
				<div class="box-header">
					<h3 class="box-title">Data Slideshow</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body table-responsive no-padding">
          <table class="table table-hover table-bordered">
            <tr>
              <th style="width:15px" class="text-center">No.</th>
              <th>Judul</th>
              <th>Deskripsi</th>
              <th>Link</th>
              <th class="text-center" style="width:100px">Aksi</th>
            </tr>
						@foreach ($slide as $slides)
            <tr>
              <td class="text-center">{{ $loop->iteration }}</td>
              <td>{{ $slides->judul }}</td>
              <td>{!! str_limit($slides->deskripsi, 50) !!}</td>
              <td><a href="{{ $slides->link }}">{{ $slides->link }}</a></td>
              <td class="text-center">
								<a href="#lihatslide{{ $slides->id }}" data-toggle="modal" class="btn btn-info btn-xs"><span class="fa fa-eye"></span></a>
								<a href="#editslide{{ $slides->id }}" data-toggle="modal" class="btn btn-success btn-xs"><span class="fa fa-edit"></span></a>
							</td>
            </tr>
						@endforeach
          </table>
        </div>
        <!-- /.box-body -->
			</div>
			<!-- /.box -->

			@foreach ($slide as $slides)
			<div class="modal fade" id="lihatslide{{ $slides->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h3>{{ $slides->judul }}</h3>
						</div>
						<div class="modal-body">
							<div class="form-horizontal">
								<div class="form-group">
									<div class="row">
										<div class="col-md-8 col-md-offset-2">
											<img src="{{ asset('img/slide/' . $slides->gambar) }}" alt="img" class="img-responsive" />
										</div>
									</div><br>

									<label class="col-md-3" align="right">Header	:</label>
									<div class="col-md-9">
										<p>{{ $slides->header }}</p>
									</div>

									<label class="col-md-3" align="right">Judul	:</label>
									<div class="col-md-9">
										<p>{{ $slides->judul }}</p>
									</div>

									<label class="col-md-3" align="right">Deskripsi	:</label>
									<div class="col-md-9">
										<p>{!! $slides->deskripsi !!}</p>
									</div>

									<label class="col-md-3" align="right">Link	:</label>
									<div class="col-md-9">
										<p>{{ $slides->link }}</p>
									</div>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			@endforeach

			<!-- edit gambar -->
			@foreach($slide as $edit)
			<div class="modal fade" id="editslide{{ $edit->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">Edit Gambar</h4>
						</div>
						<div class="modal-body">
							<!-- Horizontal Form -->
								<!-- form start -->
								<form enctype="multipart/form-data" role="form" method="POST" action="/admin-slideshow/{{ $edit->id }}">
									{{ method_field('PUT') }}
									{{ csrf_field() }}
									<div class="box-body">
										<div class="form-group{{ $errors->has('header') ? ' has-error' : '' }}">
											<label>Header</label>
											<input type="text" class="form-control" name="header" placeholder="Header Slideshow" value="{{ $edit->header }}">
												@if ($errors->has('header'))
														<span class="help-block">
																<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
																		{{ $errors->first('header') }}
																</label>
														</span>
												@endif
										</div>

										<div class="form-group{{ $errors->has('judul') ? ' has-error' : '' }}">
											<label>Judul</label>
											<input type="text" class="form-control" name="judul" placeholder="Judul Slideshow" value="{{ $edit->judul }}">
												@if ($errors->has('judul'))
														<span class="help-block">
																<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
																		{{ $errors->first('judul') }}
																</label>
														</span>
												@endif
										</div>

										<div class="form-group{{ $errors->has('gambar') ? ' has-error' : '' }}">
											<label>Gambar</label>
											<input type="file" accept="image/*" class="form-control" name="gambar">
												@if ($errors->has('gambar'))
														<span class="help-block">
																<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
																		{{ $errors->first('gambar') }}
																</label>
														</span>
												@endif
										</div>

										<div class="form-group{{ $errors->has('deskripsi') ? ' has-error' : '' }}">
											<label>Deskripsi (Pilihan)</label>
											<textarea class="form-control" name="deskripsi" rows="8" cols="40" placeholder="Deskripsi Slideshow">{{ $edit->deskripsi }}</textarea>
												@if ($errors->has('deskripsi'))
														<span class="help-block">
																<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
																		{{ $errors->first('deskripsi') }}
																</label>
														</span>
												@endif
										</div>

										<div class="form-group{{ $errors->has('link') ? ' has-error' : '' }}">
											<label>Link (Pilihan)</label>
											<input type="text" class="form-control" name="link" placeholder="Link Slideshow" value="{{ $edit->link }}">
												@if ($errors->has('link'))
														<span class="help-block">
																<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
																		{{ $errors->first('link') }}
																</label>
														</span>
												@endif
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
