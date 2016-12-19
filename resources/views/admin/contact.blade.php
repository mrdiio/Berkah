@extends('admin.layout')

@section('htmlheader_title')
	Kontak
@endsection

@section('contentheader_title')
	Kontak
@endsection

@section('breadcumb')
	<a href="#">Berkah</a>
	<li class="active">Kontak</li>
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
		    <form class="form-horizontal" method="post" action="admin-kontak">
					{{ csrf_field() }}
		      <div class="box-body">
						<div class="col-md-10">

							<div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
								<label class="col-sm-3 control-label">Alamat</label>
								<div class="col-sm-9">
									<input type="text" name="alamat" class="form-control" value="{{ $contact->alamat }}">
										@if ($errors->has('alamat'))
											<span class="help-block">
													<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
														{{ $errors->first('alamat') }}
													</label>
											</span>
										@endif
								</div>
							</div>

							<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
								<label class="col-sm-3 control-label">Email</label>
								<div class="col-sm-9">
									<input type="text" name="email" class="form-control" value="{{ $contact->email }}">
										@if ($errors->has('email'))
											<span class="help-block">
													<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
														{{ $errors->first('email') }}
													</label>
											</span>
										@endif
								</div>
							</div>

							<div class="form-group{{ $errors->has('telepon') ? ' has-error' : '' }}">
								<label class="col-sm-3 control-label">Telepon</label>
								<div class="col-sm-9">
									<input type="text" name="telepon" class="form-control" value="{{ $contact->phone }}">
										@if ($errors->has('telepon'))
											<span class="help-block">
													<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
														{{ $errors->first('telepon') }}
													</label>
											</span>
										@endif
								</div>
							</div>

							<div class="form-group{{ $errors->has('bbm') ? ' has-error' : '' }}">
								<label class="col-sm-3 control-label">Pin BBM</label>
								<div class="col-sm-9">
									<input type="text" name="bbm" class="form-control" value="{{ $contact->bbm }}">
										@if ($errors->has('bbm'))
											<span class="help-block">
													<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
														{{ $errors->first('bbm') }}
													</label>
											</span>
										@endif
								</div>
							</div>

							<div class="form-group{{ $errors->has('facebook') ? ' has-error' : '' }}">
								<label class="col-sm-3 control-label">Facebook</label>
								<div class="col-sm-9">
									<input type="text" name="facebook" class="form-control" value="{{ $contact->facebook }}">
										@if ($errors->has('facebook'))
											<span class="help-block">
													<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
														{{ $errors->first('facebook') }}
													</label>
											</span>
										@endif
								</div>
							</div>

							<div class="form-group{{ $errors->has('twitter') ? ' has-error' : '' }}">
								<label class="col-sm-3 control-label">Twitter</label>
								<div class="col-sm-9">
									<input type="text" name="twitter" class="form-control" value="{{ $contact->twitter }}">
										@if ($errors->has('twitter'))
											<span class="help-block">
													<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
														{{ $errors->first('twitter') }}
													</label>
											</span>
										@endif
								</div>
							</div>

							<div class="form-group{{ $errors->has('gplus') ? ' has-error' : '' }}">
								<label class="col-sm-3 control-label">Google+</label>
								<div class="col-sm-9">
									<input type="text" name="gplus" class="form-control" value="{{ $contact->gplus }}">
										@if ($errors->has('alamat'))
											<span class="help-block">
													<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
														{{ $errors->first('gplus') }}
													</label>
											</span>
										@endif
								</div>
							</div>

							<div class="form-group{{ $errors->has('youtube') ? ' has-error' : '' }}">
								<label class="col-sm-3 control-label">Youtube</label>
								<div class="col-sm-9">
									<input type="text" name="youtube" class="form-control" value="{{ $contact->youtube }}">
										@if ($errors->has('youtube'))
											<span class="help-block">
													<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
														{{ $errors->first('youtube') }}
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
