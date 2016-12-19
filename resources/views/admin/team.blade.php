@extends('admin.layout')

@section('htmlheader_title')
	Tim
@endsection

@section('contentheader_title')
	Tim
@endsection

@section('breadcumb')
	Tim
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
						</div>
					@endif
					<div class="box box-danger">

						<div class="box-body">
							<div class="row">
								<!-- Profile Image -->
								@foreach($team as $tim)
								<div class="col-md-3">
					        <div class="box">
					          <div class="box-body box-profile">
					            <a href="{{ asset('img/tim/' . $tim->foto) }}" class="fancybox">
												<img class="profile-user-img img-responsive img-circle" src="{{ asset('img/tim/' . $tim->foto) }}" alt="User profile picture">
											</a>
					            <h3 class="profile-username text-center">{{ $tim->nama }}</h3>
					            <p class="text-muted text-center">{{ $tim->jabatan }}</p>
					            <ul class="list-group list-group-unbordered">
					              <li class="list-group-item text-center">
					                <a href="{{ $tim->facebook }}" class="btn btn-social-icon btn-facebook" target="_blank"><i class="fa fa-facebook"></i></a>
													<a href="{{ $tim->twitter }}" class="btn btn-social-icon btn-twitter" target="_blank"><i class="fa fa-twitter"></i></a>
													<a href="{{ $tim->instagram }}" class="btn btn-social-icon btn-instagram" target="_blank"><i class="fa fa-instagram"></i></a>
													<a href="{{ $tim->gplus }}" class="btn btn-social-icon btn-google" target="_blank"><i class="fa fa-google-plus"></i></a>
					              </li>
					            </ul>
					            <a href="#ubahtim{{ $tim->id }}" data-toggle="modal" type="submit" class="btn btn-danger btn-block"><b> Ubah</b></a>
					          </div>
					          <!-- /.box-body -->
					        </div>
								</div>
								@endforeach
								<!-- /.box Profile -->
							</div>
						</div>
            <!-- /.box-body -->
          </div>
				</div>
			</div>

			<!-- Modal -->
			@foreach($team as $tim)
			<div class="modal fade" id="ubahtim{{ $tim->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header alert alert-danger">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">Ubah</h4>
						</div>
						<div class="modal-body">
							<!-- Horizontal Form -->
								<!-- form start -->
								<form enctype="multipart/form-data" class="form-horizontal" role="form" method="POST" action="/admin-tim/{{ $tim->id }}">
									{{ method_field('PUT') }}
									{{ csrf_field() }}
									<div class="box-body">
										<div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
						          <label class="col-md-2 control-label">Nama</label>
						          <div class="col-md-10">
						            <input type="text" class="form-control" name="nama" value="{{ $tim->nama }}">
												@if ($errors->has('nama'))
														<span class="help-block has-error">
																<label class="control-label"><i class="fa fa-times-circle-o"></i>
																	{{ $errors->first('nama') }}
																</label>
														</span>
												@endif
						          </div>
						        </div>

										<div class="form-group{{ $errors->has('jabatan') ? ' has-error' : '' }}">
						          <label class="col-md-2 control-label">Jabatan</label>
						          <div class="col-md-10">
						            <input type="text" class="form-control" name="jabatan" value="{{ $tim->jabatan }}">
												@if ($errors->has('jabatan'))
														<span class="help-block has-error">
																<label class="control-label"><i class="fa fa-times-circle-o"></i>
																	{{ $errors->first('jabatan') }}
																</label>
														</span>
												@endif
						          </div>
						        </div>

										<div class="form-group{{ $errors->has('foto') ? ' has-error' : '' }}">
											<label class="col-md-2 control-label">Foto</label>
											<div class="col-sm-10">
												<input type="file" accept="image/*" class="form-control" name="foto">
													@if ($errors->has('foto'))
															<span class="help-block">
																	<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
																			{{ $errors->first('foto') }}
																	</label>
															</span>
													@endif
											</div>
										</div>

										<div class="form-group{{ $errors->has('facebook') ? ' has-error' : '' }}">
						          <label class="col-md-2 control-label">Facebook</label>
						          <div class="col-md-10">
						            <input type="text" class="form-control" name="facebook" value="{{ $tim->facebook }}">
												@if ($errors->has('facebook'))
														<span class="help-block has-error">
																<label class="control-label"><i class="fa fa-times-circle-o"></i>
																	{{ $errors->first('facebook') }}
																</label>
														</span>
												@endif
						          </div>
						        </div>

										<div class="form-group{{ $errors->has('twitter') ? ' has-error' : '' }}">
						          <label class="col-md-2 control-label">Twitter</label>
						          <div class="col-md-10">
						            <input type="text" class="form-control" name="twitter" value="{{ $tim->twitter }}">
												@if ($errors->has('twitter'))
														<span class="help-block has-error">
																<label class="control-label"><i class="fa fa-times-circle-o"></i>
																	{{ $errors->first('twitter') }}
																</label>
														</span>
												@endif
						          </div>
						        </div>

										<div class="form-group{{ $errors->has('instagram') ? ' has-error' : '' }}">
						          <label class="col-md-2 control-label">Instagram</label>
						          <div class="col-md-10">
						            <input type="text" class="form-control" name="instagram" value="{{ $tim->instagram }}">
												@if ($errors->has('instagram'))
														<span class="help-block has-error">
																<label class="control-label"><i class="fa fa-times-circle-o"></i>
																	{{ $errors->first('instagram') }}
																</label>
														</span>
												@endif
						          </div>
						        </div>

										<div class="form-group{{ $errors->has('gplus') ? ' has-error' : '' }}">
						          <label class="col-md-2 control-label">Google+</label>
						          <div class="col-md-10">
						            <input type="text" class="form-control" name="gplus" value="{{ $tim->gplus }}">
												@if ($errors->has('gplus'))
														<span class="help-block has-error">
																<label class="control-label"><i class="fa fa-times-circle-o"></i>
																	{{ $errors->first('gplus') }}
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
