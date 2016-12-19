@extends('admin.layout')

@section('htmlheader_title')
	Testimoni
@endsection

@section('contentheader_title')
	Testimoni
@endsection

@section('breadcumb')
	Testimoni
@endsection

@section('main-content')
	<div class="row">
		<div class="col-md-12">

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

			<div class="box box-info">
		    <div class="box-header with-border">
		      <h3 class="box-title">Data Testimoni</h3>
		    </div>
		    <!-- /.box-header -->

				<!-- Post -->
				@foreach($testimoni as $testimonial)
	      <div class="post" style="padding:10px">
	        <div class="user-block">
						<img class="img-circle img-responsive img-bordered-sm" src="{{ asset('img/testimoni/' . $testimonial->gambar) }}" alt="user image">
            <span class="username">
              <a href="#">{{ $testimonial->nama }}</a>
            </span>
						<span class="description">{{ $testimonial->profesi }}</span>
						<p>{{ $testimonial->deskripsi }}</p>
						<ul class="list-inline">
		          <li class="pull-right"><a href="#edittestimoni{{ $testimonial->id }}" data-toggle="modal" class="btn btn-success"><i class="fa fa-edit"></i> edit</a></li>
		        </ul>
	        </div>
	        <!-- /.user-block -->
	      </div>
				@endforeach
				<!-- /.post -->
		  </div>
		</div>
	</div>

	<!-- edit gambar -->
	@foreach($testimoni as $edit)
	<div class="modal fade" id="edittestimoni{{ $edit->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Edit Testimoni</h4>
				</div>
				<div class="modal-body">
					<!-- Horizontal Form -->
						<!-- form start -->
						<form enctype="multipart/form-data" role="form" method="POST" action="/admin-testimoni/{{ $edit->id }}">
							{{ method_field('PUT') }}
							{{ csrf_field() }}
							<div class="box-body">
								<div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
									<label>Header</label>
									<input type="text" class="form-control" name="nama" placeholder="Nama" value="{{ $edit->nama }}">
								</div>

								<div class="form-group{{ $errors->has('profesi') ? ' has-error' : '' }}">
									<label>Judul</label>
									<input type="text" class="form-control" name="profesi" placeholder="Profesi" value="{{ $edit->profesi }}">
								</div>

								<div class="form-group{{ $errors->has('deskripsi') ? ' has-error' : '' }}">
									<label>Deskripsi</label>
									<textarea class="form-control" name="deskripsi" rows="8" cols="40" placeholder="Deskripsi Slideshow">{{ $edit->deskripsi }}</textarea>
								</div>

								<div class="form-group{{ $errors->has('gambar') ? ' has-error' : '' }}">
									<label>Gambar</label>
									<input type="file" accept="image/*" class="form-control" name="gambar">
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
