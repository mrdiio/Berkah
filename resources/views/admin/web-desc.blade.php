@extends('admin.layout')

@section('htmlheader_title')
	Deskripsi Website
@endsection

@section('contentheader_title')
	Deskripsi Website
@endsection

@section('breadcumb')
	<a href="#">Berkah</a>
	<li class="active">Deskripsi Website</li>
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

			<div class="box box-info">
		    <div class="box-header with-border">
		      <h3 class="box-title">Edit Profile</h3>
		    </div>
		    <!-- /.box-header -->
		    <!-- form start -->
		    <form class="form-horizontal" method="post" action="deskripsi-web">
					{{ csrf_field() }}
		      <div class="box-body">
						<div class="col-md-10">

							<div class="form-group{{ $errors->has('webtitle') ? ' has-error' : '' }}">
								<label class="col-sm-3 control-label">Website Title</label>
								<div class="col-sm-9">
									<input type="text" name="webtitle" class="form-control" value="{{ $web->title }}">
										@if ($errors->has('webtitle'))
											<span class="help-block">
													<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
														{{ $errors->first('webtitle') }}
													</label>
											</span>
										@endif
								</div>
							</div>

							<div class="form-group{{ $errors->has('webdesc') ? ' has-error' : '' }}">
								<label class="col-sm-3 control-label">Website Description</label>
								<div class="col-sm-9">
									<textarea name="webdesc" class="form-control" rows="3" placeholder="Enter ...">{{ $web->description }}</textarea>
										@if ($errors->has('webdesc'))
											<span class="help-block">
													<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
														{{ $errors->first('webdesc') }}
													</label>
											</span>
										@endif
								</div>
							</div>

							<div class="form-group{{ $errors->has('keyword') ? ' has-error' : '' }}">
								<label class="col-sm-3 control-label">Keywords</label>
								<div class="col-sm-9">
									<input type="text" name="keyword" class="form-control" value="{{ $web->keyword }}">
										@if ($errors->has('keyword'))
											<span class="help-block">
													<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
														{{ $errors->first('keyword') }}
													</label>
											</span>
										@endif
								</div>
							</div>

						<div class="form-group">
							<div class="col-md-3 col-md-offset-3">
				        <button type="submit" class="btn btn-danger">Submit</button>
							</div>
						</div>

						</div>
		      </div>
		      <!-- /.box-body -->
		    </form>
		  </div>
		</div>
	</div>
@endsection
