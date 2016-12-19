@extends('admin.layout')

@section('htmlheader_title')
	Artikel
@endsection

@section('contentheader_title')
	Artikel
@endsection

@section('breadcumb')
	<a href="/admin-properti">Artikel</a>
	<li class="active">Edit</li>
@endsection

@section('main-content')
			<div class="row">
        <div class="col-xs-12">
					<div class="box">
            <div class="box-header">
							<h3 class="box-title">Edit Artikel</h3>
            </div>
            <!-- /.box-header -->
						<form enctype="multipart/form-data" class="form-horizontal" role="form" method="POST" action="/admin-artikel/{{ $artikel->id }}">
							{{ method_field('PUT') }}
							{{ csrf_field() }}
							<div class="box-body">
								<div class="col-md-12">

				        <div class="form-group{{ $errors->has('judul') ? ' has-error' : '' }}">
				          <label class="col-md-1 control-label">Judul</label>
				          <div class="col-md-11">
				            <input type="text" class="form-control" name="judul" value="{{ $artikel->judul }}">
										@if ($errors->has('judul'))
												<span class="help-block has-error">
														<label class="control-label"><i class="fa fa-times-circle-o"></i>
															{{ $errors->first('judul') }}
														</label>
												</span>
										@endif
				          </div>
				        </div>

								<div class="form-group{{ $errors->has('kategori') ? ' has-error' : '' }}">
                  <label class="col-md-1 control-label">Kategori</label>
									<div class="col-md-3">
		                <select class="form-control" name="kategori">
		                  <option value="">Pilih Salah Satu</option>
											@foreach ($kategori as $categories)
		                  <option value="{{ $categories->id }}" {{ $artikel->category_id == $categories->id ? 'selected':'' }}>{{ $categories->nama }}</option>
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

								<div class="form-group{{ $errors->has('deskripsi') ? ' has-error' : '' }}">
				          <label class="col-md-1 control-label">Deskripsi</label>
				          <div class="col-md-11">
										<textarea name="deskripsi" id="editor1" rows="8" cols="40">{{ $artikel->deskripsi }}</textarea>
										@if ($errors->has('deskripsi'))
												<span class="help-block has-error">
														<label class="control-label"><i class="fa fa-times-circle-o"></i>
															{{ $errors->first('deskripsi') }}
														</label>
												</span>
										@endif
				          </div>
				        </div>

								<div class="form-group{{ $errors->has('gambar') ? ' has-error' : '' }}">
									<label class="col-md-1 control-label">Gambar</label>
									<div class="col-sm-5">
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

								<div class="form-group">
									<div class="col-md-12">
						        <button type="submit" class="btn btn-success pull-right">Simpan</button>
									</div>
								</div>

								</div>
				      </div>
				      <!-- /.box-body -->

						</form>
            <!-- /.box-body -->
          </div>
				</div>
			</div>
@endsection

@push('js')
	<!-- ckeditor -->
	<script src="{{ asset('adminpage/plugins/ckeditor/ckeditor.js') }}"></script>
	<script src="{{ asset('adminpage/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
	<script>
		$(function () {
			// Replace the <textarea id="editor1"> with a CKEditor
			// instance, using default configuration.
			CKEDITOR.replace('editor1');
			//bootstrap WYSIHTML5 - text editor
			$(".textarea").wysihtml5();
		});

		//Datemask dd/mm/yyyy
		$("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
		//Datemask2 mm/dd/yyyy
		$("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
		//Money Euro
		$("[data-mask]").inputmask();
	</script>
@endpush
