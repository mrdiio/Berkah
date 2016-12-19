@extends('admin.layout')

@section('htmlheader_title')
	Tentang
@endsection

@section('contentheader_title')
	Tentang
@endsection

@section('breadcumb')
	<a href="#">Berkah</a>
	<li class="active">Tentang</li>
@endsection

@section('main-content')
	<div class="row">
		<div class="col-md-12">

			@if(Session::has('pesan'))
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

			<div class="box box-primary">
		    <div class="box-header">
					<button href="#editabout" data-toggle="modal" type="submit" class="btn btn-primary">Edit</button>
		    </div>
		    <!-- /.box-header -->
				<div class="form-horizontal">
					<div class="form-group">
						<label class="col-sm-3 col-md-2" align="right">Perusahaan	:</label>
						<div class="col-sm-9 col-md-9">
							<p>{{ $about->nama }}</p>
						</div>

						<label class="col-sm-3 col-md-2" align="right">Tentang	:</label>
						<div class="col-sm-9 col-md-9">
							{!! $about->tentang !!}
						</div>

						<label class="col-sm-3 col-md-2" align="right">Visi	:</label>
						<div class="col-sm-9 col-md-9">
							<p>{!! $about->visi !!}</p>
						</div>

						<label class="col-sm-3 col-md-2" align="right">Misi	:</label>
						<div class="col-sm-9 col-md-9">
							<p>{!! $about->misi !!}</p>
						</div>

						<label class="col-sm-3 col-md-2" align="right">Logo	:</label>
						<div class="col-sm-9 col-md-9">
							<p>{{ $about->logo }}</p>
						</div>

						<label class="col-sm-3 col-md-2" align="right">Video	:</label>
						<div class="col-sm-9 col-md-9">
							<p><a href="{{ $about->video }}" target="_blank">{{ $about->video }}</a></p>
						</div>

						<label class="col-sm-3 col-md-2" align="right">Cover Video	:</label>
						<div class="col-sm-9 col-md-9">
							<p>{{ $about->cover_video }}</p>
						</div>
					</div>
				</div>
		  </div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="editabout" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Edit Profil Perusahaan</h4>
				</div>
				<div class="modal-body">
					<!-- Horizontal Form -->
						<!-- form start -->
						<form enctype="multipart/form-data" class="form-horizontal" role="form" method="POST" action="admin-tentang">{{ csrf_field() }}
							<div class="box-body">

								<div class="form-group{{ $errors->has('perusahaan') ? ' has-error' : '' }}">
									<label for="perusahaan" class="col-sm-3 control-label">Perusahaan</label>
									<div class="col-sm-9">
										<input type="text" class="form-control" name="perusahaan" value="{{ $about->nama }}" placeholder="Nama Perusahaan">
											@if ($errors->has('perusahaan'))
													<span class="help-block">
															<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
																{{ $errors->first('perusahaan') }}
															</label>
													</span>
											@endif
									</div>
								</div>

								<div class="form-group{{ $errors->has('deskripsi') ? ' has-error' : '' }}">
									<label for="deskripsi" class="col-sm-3 control-label">Tentang</label>
									<div class="col-sm-9">
											<textarea id="editor1" name="about" rows="10">{{ $about->tentang }}</textarea>
											@if ($errors->has('deskripsi'))
													<span class="help-block has-error">
															<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
																{{ $errors->first('deskripsi') }}
															</label>
													</span>
											@endif
									</div>
								</div>

								<div class="form-group{{ $errors->has('visi') ? ' has-error' : '' }}">
									<label for="visi" class="col-sm-3 control-label">Visi</label>
									<div class="col-sm-9">
										<textarea name="visi" class="form-control" rows="3" placeholder="Enter ...">{{ $about->visi }}</textarea>
											@if ($errors->has('visi'))
												<span class="help-block">
														<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
															{{ $errors->first('visi') }}
														</label>
												</span>
											@endif
									</div>
								</div>

								<div class="form-group{{ $errors->has('misi') ? ' has-error' : '' }}">
									<label for="misi" class="col-sm-3 control-label">Misi</label>
									<div class="col-sm-9">
										<textarea name="misi" class="form-control" rows="3" placeholder="Enter ...">{{ $about->misi }}</textarea>
											@if ($errors->has('misi'))
												<span class="help-block">
														<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
															{{ $errors->first('misi') }}
														</label>
												</span>
											@endif
									</div>
								</div>

								<div class="form-group{{ $errors->has('logo') ? ' has-error' : '' }}">
									<label class="col-sm-3 control-label">Logo</label>
									<div class="col-sm-9">
										<input type="file" accept="image/*" class="form-control" name="logo" data-toggle="tooltip" title="Ukuran Gambar 1 : 1" data-placement="bottom">
											@if ($errors->has('logo'))
													<span class="help-block">
															<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
																{{ $errors->first('logo') }}
															</label>
													</span>
											@endif
									</div>
								</div>

								<div class="form-group{{ $errors->has('video') ? ' has-error' : '' }}">
									<label for="video" class="col-sm-3 control-label">Video Embed</label>
									<div class="col-sm-9">
										<input type="text" name="video" class="form-control" value="{{ $about->video }}">
											@if ($errors->has('video'))
												<span class="help-block">
														<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
															{{ $errors->first('video') }}
														</label>
												</span>
											@endif
									</div>
								</div>

								<div class="form-group{{ $errors->has('cover') ? ' has-error' : '' }}">
									<label for="cover" class="col-sm-3 control-label">Cover Video</label>
									<div class="col-sm-9">
										<input type="file" accept="image/*" class="form-control" name="cover" data-toggle="tooltip" title="Resolusi Gambar 600 x 400 aspect ratio 3 : 2" data-placement="bottom">
											@if ($errors->has('cover'))
													<span class="help-block">
															<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
																{{ $errors->first('cover') }}
															</label>
													</span>
											@endif
									</div>
								</div>
							</div>
							<!-- /.box-body -->

							<div class="box-footer">

								<button type="submit" class="btn btn-danger pull-right">
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
	<!-- ckeditor -->
	<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
	<script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
	<script src="{{ asset('adminpage/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
	<script>
	$(function () {
		// Replace the <textarea id="editor1"> with a CKEditor
		// instance, using default configuration.
		// CKEDITOR.replace('editor1');
		//bootstrap WYSIHTML5 - text editor
		$("textarea").ckeditor({
			filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
			filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
			filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
			filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
		});
	});
	</script>
@endpush
