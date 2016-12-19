@extends('admin.layout')

@section('htmlheader_title')
	Properti
@endsection

@section('contentheader_title')
	Properti
@endsection

@section('breadcumb')
	<a href="/admin-properti">Properti</a>
	<li class="active">Tambah</li>
@endsection

@push('css')
	<!-- Fancybox slider -->
	<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/jquery.fancybox.css') }}">
	<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('adminpage/css/gallery-style.css') }}">
	<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('adminpage/css/gallery-style-theme.css') }}">
@endpush

@section('main-content')
			<div class="row">
        <div class="col-xs-12">
					<div class="box">
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
            <div class="box-header">
							<button href="#tambahgambar" data-toggle="modal" type="submit" class="btn btn-primary">Tambah Gambar</button>
							<a href="/admin-properti/create" class="btn btn-success pull-right">Selesai</a>
            </div>
            <!-- /.box-header -->
						<!-- start single gallery image -->
						<div class="box-body" style="min-height:100%">
							
							@foreach($gambar as $gambar_properti )
      				<div class="col-md-3">
                <div class="mu-single-gallery">
                  <div class="mu-single-gallery-item">
                    <div class="mu-single-gallery-img">
                      <a href="#"><img alt="img" src="uploads/images/blog/small/{{$gambar_properti}}"></a>
                    </div>
                    <div class="mu-single-gallery-info">
                      <div class="mu-single-gallery-info-inner">
                        <a href="uploads/images/blog/big/{{$gambar_properti}}" data-fancybox-group="gallery" class="fancybox"><span class="fa fa-eye"></span></a>
                      </div>
                    </div>
                  </div>
                </div>
							</div>
							@endforeach

						</div>
            <!-- /.box-body -->
          </div>
				</div>
			</div>

			<!-- Modal -->
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
								<form enctype="multipart/form-data" class="form-horizontal" role="form" method="POST" action="/properti-gambar">{{ csrf_field() }}
									<div class="box-body">

										<div class="form-group{{ $errors->has('gambar') ? ' has-error' : '' }}">
											<div class="col-sm-12">
												<input type="file" accept="image/*" class="form-control" name="gambar" data-toggle="tooltip" title="Ukuran Gambar 1 : 1" data-placement="bottom">
													@if ($errors->has('gambar'))
															<span class="help-block">
																	<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
																			{{ $errors->first('gambar') }}
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

								</form>

						</div>
					</div>
				</div>
			</div>
@endsection

@push('js')
	<!-- Slick slider -->
	<script type="text/javascript" src="js/slick.js"></script>
	<!-- Counter -->
	<script type="text/javascript" src="js/waypoints.js"></script>
	<script type="text/javascript" src="js/jquery.counterup.js"></script>
	<!-- Mixit slider -->
	<script type="text/javascript" src="js/jquery.mixitup.js"></script>
	<!-- Add fancyBox -->
	<script type="text/javascript" src="js/jquery.fancybox.pack.js"></script>
	<!-- Custom js -->
	<script src="js/custom.js"></script>
@endpush
