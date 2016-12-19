@extends('admin.layout')

@section('htmlheader_title')
	User
@endsection

@section('contentheader_title')
	user
@endsection

@section('breadcumb')
	User
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
		      <h3 class="box-title">Edit User</h3>
		    </div>
		    <!-- /.box-header -->
		    <!-- form start -->
		    <form enctype="multipart/form-data" class="form-horizontal" method="post" action="admin-user">
					{{ csrf_field() }}
		      <div class="box-body">
						<div class="col-md-8">


		        <div class="form-group{{ $errors->has('Nama') ? ' has-error' : '' }}">
		          <label class="col-md-3 control-label">Nama</label>
		          <div class="col-md-9">
		            <input type="text" class="form-control" name="Nama" value="{{ Auth::user()->name }}">
								@if ($errors->has('Nama'))
										<span class="help-block has-error">
												<label class="control-label"><i class="fa fa-times-circle-o"></i>
													{{ $errors->first('Nama') }}
												</label>
										</span>
								@endif
		          </div>
		        </div>

						<div class="form-group{{ $errors->has('Email') ? ' has-error' : '' }}">
							<label class="col-md-3 control-label">Email</label>
							<div class="col-md-9">
								<input type="email" class="form-control" name="Email" value="{{ Auth::user()->email }}">
								@if ($errors->has('Email'))
										<span class="help-block has-error">
												<label class="control-label"><i class="fa fa-times-circle-o"></i>
													{{ $errors->first('Email') }}
												</label>
										</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('Gambar') ? ' has-error' : '' }}">
							<label class="col-md-3 control-label">Gambar</label>
							<div class="col-md-9">
								<img src="adminpage/img/{{ Auth::user()->gambar }}" width="100" alt="user" />
								<input accept="image/*" type="file" name="Gambar" class="form-control" data-toggle="tooltip" title="Ukuran Gambar 1 : 1" data-placement="bottom">
								@if ($errors->has('Gambar'))
										<span class="help-block has-error">
												<label class="control-label"><i class="fa fa-times-circle-o"></i>
													{{ $errors->first('Gambar') }}
												</label>
										</span>
								@endif
							</div>
						</div>

						<br>
		        <div class="form-group{{ $errors->has('NewPassword') ? ' has-error' : '' }}">
		          <label class="col-md-3 control-label">New Password</label>
		          <div class="col-md-9">
		            <input type="password" class="form-control" name="NewPassword" placeholder="Password" value="{{ old('New Password')}}">
								@if ($errors->has('NewPassword'))
										<span class="help-block has-error">
												<label class="control-label"><i class="fa fa-times-circle-o"></i>
													{{ $errors->first('NewPassword') }}
												</label>
										</span>
								@endif
		          </div>
		        </div>

						<div class="form-group{{ $errors->has('PasswordConfirmation') ? ' has-error' : '' }}">
		          <label class="col-md-3 control-label">Confirm New Password</label>
		          <div class="col-md-9">
		            <input type="password" class="form-control" name="PasswordConfirmation" placeholder="Confirm Password">
								@if ($errors->has('PasswordConfirmation'))
										<span class="help-block has-error">
												<label class="control-label"><i class="fa fa-times-circle-o"></i>
													{{ $errors->first('PasswordConfirmation') }}
												</label>
										</span>
								@endif
		          </div>
		        </div>

						<div class="form-group">
							<div class="col-md-12">
				        <button type="submit" class="btn btn-danger pull-right">Submit</button>
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
