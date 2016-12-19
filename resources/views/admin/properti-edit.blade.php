@extends('admin.layout')

@section('htmlheader_title')
	Properti
@endsection

@section('contentheader_title')
	Properti
@endsection

@section('breadcumb')
	<a href="/admin-properti">Properti</a>
	<li class="active">Edit</li>
@endsection

@push('css')
	<style media="screen">
		#map-canvas{
			height: 400px;
			padding: 0;
		}
		.controlcaripeta {
			margin-top: 10px;
			border: 1px solid transparent;
			border-radius: 2px 0 0 2px;
			box-sizing: border-box;
			-moz-box-sizing: border-box;
			height: 32px;
			outline: none;
			box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
		}
		#restore {
			margin: 10px;
		}
		#caripeta {
			background-color: #fff;
			font-family: Roboto;
			font-size: 15px;
			font-weight: 300;
			margin-left: 12px;
			padding: 0 11px 0 13px;
			text-overflow: ellipsis;
			width: 300px;
		}
		#caripeta:focus {
			border-color: #4d90fe;
		}
	</style>
@endpush

@section('main-content')
			<div class="row">
        <div class="col-xs-12">
					<div class="box">
            <div class="box-header">
							<h3 class="box-title">Edit Properti</h3>
            </div>
            <!-- /.box-header -->
						<form enctype="multipart/form-data" class="form-horizontal" role="form" method="POST" action="/admin-properti/{{ $properti->id }}">
							{{ method_field('PUT') }}
							{{ csrf_field() }}
							<div class="box-body">
								<div class="col-md-12">

				        <div class="form-group{{ $errors->has('judul') ? ' has-error' : '' }}">
				          <label class="col-md-1 control-label">Judul</label>
				          <div class="col-md-11">
				            <input type="text" class="form-control" name="judul" value="{{ $properti->judul }}">
										@if ($errors->has('judul'))
												<span class="help-block has-error">
														<label class="control-label"><i class="fa fa-times-circle-o"></i>
															{{ $errors->first('judul') }}
														</label>
												</span>
										@endif
				          </div>
				        </div>

								<div class="form-group{{ $errors->has('seo') ? ' has-error' : '' }}">
				          <label class="col-md-1 control-label">Seo Judul</label>
				          <div class="col-md-11">
				            <input type="text" class="form-control" name="seo" value="{{ $properti->seo_judul }}">
										@if ($errors->has('seo'))
												<span class="help-block has-error">
														<label class="control-label"><i class="fa fa-times-circle-o"></i>
															{{ $errors->first('seo') }}
														</label>
												</span>
										@endif
				          </div>
				        </div>

								<div class="row">
									<div class="col-md-11 col-md-offset-1">
										<div class="box">
											<div class="box-header">
												<h3 class="box-title">Spesifikasi :</h3>
											</div>

											<div class="box-body">
												<div class="col-md-4">
													<div class="form-group{{ $errors->has('jenis') ? ' has-error' : '' }}">
														<div class="col-md-12">
															<label class="control-label">Jenis</label>
															<select class="form-control" name="jenis">
																<option value="">Pilih Salah Satu</option>
																@foreach ($type as $jenis)
																<option value="{{ $jenis->id }}" {{ $properti->type_id == $jenis->id ? 'selected':'' }}>{{ $jenis->nama }}</option>
																@endforeach
															</select>
															@if ($errors->has('jenis'))
																	<span class="help-block has-error">
																			<label class="control-label"><i class="fa fa-times-circle-o"></i>
																				{{ $errors->first('jenis') }}
																			</label>
																	</span>
															@endif
														</div>
													</div>
												</div>

												<div class="col-md-4">
													<div class="form-group{{ $errors->has('harga') ? ' has-error' : '' }}">
														<div class="col-md-12">
															<label class="control-label">Harga</label>
															<input type="number" class="form-control" name="harga" value="{{ $properti->harga }}">
															@if ($errors->has('harga'))
															<span class="help-block has-error">
																<label class="control-label"><i class="fa fa-times-circle-o"></i>
																	{{ $errors->first('harga') }}
																</label>
															</span>
															@endif
														</div>
													</div>
												</div>

												<div class="col-md-4">
													<div class="form-group{{ $errors->has('sertifikat') ? ' has-error' : '' }}">
														<div class="col-md-12">
															<label class="control-label">Sertifikat</label>
															<select class="form-control" name="sertifikat">
																<option value="">Pilih Salah Satu</option>
																<option value="Hak Milik" {{ $properti->sertifikat == 'Hak Milik' ? 'selected':'' }}>Hak Milik</option>
							                  <option value="Hak Guna Bangunan" {{ $properti->sertifikat == 'Hak Guna Bangunan' ? 'selected':'' }}>Hak Guna Bangunan</option>
							                  <option value="Lainnya (PPJB, Girik, Adat, dll)" {{ $properti->sertifikat == 'Lainyna' ? 'selected':'' }}>Lainnya (PPJB, Girik, Adat, dll)</option>
															</select>
															@if ($errors->has('sertifikat'))
																	<span class="help-block has-error">
																			<label class="control-label"><i class="fa fa-times-circle-o"></i>
																				{{ $errors->first('sertifikat') }}
																			</label>
																	</span>
															@endif
														</div>
													</div>
												</div>

												<div class="col-md-4">
													<div class="form-group{{ $errors->has('luas') ? ' has-error' : '' }}">
														<div class="col-md-12">
															<label class="control-label">Luas Tanah</label>
															<input type="number" step="0.01" class="form-control" name="luas" value="{{ $properti->luas }}">
															@if ($errors->has('luas'))
																	<span class="help-block has-error">
																			<label class="control-label"><i class="fa fa-times-circle-o"></i>
																				{{ $errors->first('luas') }}
																			</label>
																	</span>
															@endif
														</div>
													</div>
												</div>

												<div class="col-md-4">
													<div class="form-group{{ $errors->has('luas_bangunan') ? ' has-error' : '' }}">
														<div class="col-md-12">
															<label class="control-label">Luas Bangunan (Pilihan)</label>
															<input type="number" step="0.01" class="form-control" name="luas_bangunan" value="{{ $properti->luas_bangunan }}">
														</div>
													</div>
												</div>


												<div class="col-md-4">
													<div class="form-group{{ $errors->has('lantai') ? ' has-error' : '' }}">
														<div class="col-md-12">
															<label class="control-label">Lantai (Pilihan)</label>
															<input type="number" class="form-control" name="lantai" value="{{ $properti->lantai }}">
														</div>
													</div>
												</div>

												<div class="col-md-4">
													<div class="form-group{{ $errors->has('kamar_tidur') ? ' has-error' : '' }}">
														<div class="col-md-12">
															<label class="control-label">Kamar Tidur (Pilihan)</label>
															<input type="number" class="form-control" name="kamar_tidur" value="{{ $properti->kamar_tidur }}">
														</div>
													</div>
												</div>

												<div class="col-md-4">
													<div class="form-group{{ $errors->has('kamar_mandi') ? ' has-error' : '' }}">
														<div class="col-md-12">
															<label class="control-label">Kamar Mandi (Pilihan)</label>
															<input type="number" class="form-control" name="kamar_mandi" value="{{ $properti->kamar_mandi }}">
														</div>
													</div>
												</div>

												<div class="col-md-4">
													<div class="form-group{{ $errors->has('daya') ? ' has-error' : '' }}">
														<div class="col-md-12">
															<label class="control-label">Daya Lisrik (Pilihan)</label>
															<input type="number" class="form-control" name="daya" value="{{ $properti->watt }}">
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
				          <label class="col-md-1 control-label">Lokasi</label>
				          <div class="col-md-11">
				            <input type="text" class="form-control" name="alamat" value="{{ $properti->alamat }}">
										@if ($errors->has('alamat'))
												<span class="help-block has-error">
														<label class="control-label"><i class="fa fa-times-circle-o"></i>
															{{ $errors->first('alamat') }}
														</label>
												</span>
										@endif
				          </div>
				        </div>

								<!-- Google Maps -->
								<div class="row">
									<div class="col-md-3 col-md-offset-1">
										<div class="form-group{{ $errors->has('lat') ? ' has-error' : '' }}">
											<div class="col-md-12">
												<label>Latitude</label>
												<input type="text" class="form-control" name="lat" id="lat" readonly="true" value="{{ $properti->lat }}">
												@if ($errors->has('lat'))
														<span class="help-block has-error">
																<label class="control-label"><i class="fa fa-times-circle-o"></i>
																	{{ $errors->first('lat') }}
																</label>
														</span>
												@endif
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group{{ $errors->has('lng') ? ' has-error' : '' }}">
											<div class="col-md-12">
												<label>Longitude</label>
												<input type="text" class="form-control" name="lng" id="lng" readonly="true" value="{{ $properti->lng }}">
												@if ($errors->has('lng'))
														<span class="help-block has-error">
																<label class="control-label"><i class="fa fa-times-circle-o"></i>
																	{{ $errors->first('lng') }}
																</label>
														</span>
												@endif
											</div>
										</div>
									</div>
									<div class="col-md-11 col-md-offset-1">
									<div class="form-group">
										<div class="col-md-12">
											<input id="caripeta" class="controlcaripeta" type="text">
											<button onclick="resetEdit();" id="restore" class="btn btn-danger" type="button">Restore</button>
											<div id="map-canvas" class="col-md-12"></div>
										</div>
									</div>
								</div>
								</div>
								<!-- /Google Maps -->

								<div class="form-group{{ $errors->has('deskripsi') ? ' has-error' : '' }}">
				          <label class="col-md-1 control-label">Deskripsi</label>
				          <div class="col-md-11">
										<textarea name="deskripsi" id="editor1" rows="8" cols="40">{!! $properti->deskripsi !!}</textarea>
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
									<div class="col-sm-11">
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
	<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
	<script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
	<script src="{{ asset('adminpage/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
	<!-- InputMask -->
	<script src="{{ asset('adminpage/plugins/input-mask/jquery.inputmask.js') }}"></script>
	<script src="{{ asset('adminpage/plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
	<script src="{{ asset('adminpage/plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>

	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAK8ga87Ny5F2mb3SX3U6-TwIxUQZGMy1c&libraries=places&callback=initMap"
	 	async defer></script>
	<script type="text/javascript">
	var map;
	var latEdit = {{ $properti->lat }};
	var lngEdit = {{ $properti->lng }};
	var editPosition = {lat: latEdit, lng: lngEdit}; //posisi berkah properti
	var markers = [];
	var marker;

	function deleteMarkers() {
		clearMarkers();
		markers;
	}

	function clearMarkers() {
		setMapOnAll(null);
	}

	function setMapOnAll(map) {
		for (var i = 0; i < markers.length; i++) {
			markers[i].setMap(map);
		}
	}

	function addMarker(latLng) {
		deleteMarkers();
		marker = new google.maps.Marker({
			position: latLng,
			map: map,
			draggable: true,
		});
		markers.push(marker);
		marker.addListener('drag', handleEvent);
		marker.addListener('click', handleEvent);
	}
	function handleEvent(event) {
    document.getElementById('lat').value = event.latLng.lat();
    document.getElementById('lng').value = event.latLng.lng();
	}

	function resetEdit(event){
			addMarker(editPosition);
			document.getElementById('lat').value = latEdit;
	    document.getElementById('lng').value = lngEdit;
			map.panTo(editPosition);
	}

	function initMap() {
		map = new google.maps.Map(document.getElementById('map-canvas'), {
			center: editPosition,
			zoom: 17,
		});

		map.addListener('click', function(event) {
			addMarker(event.latLng);
			handleEvent(event);
		});
		map.addListener('load', addMarker(editPosition));

		// Create the search box and link it to the UI element.
		var input = document.getElementById('caripeta');
		var restore = document.getElementById('restore');
		var searchBox = new google.maps.places.SearchBox(input);
		map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
		map.controls[google.maps.ControlPosition.TOP_RIGHT].push(restore);

		// Bias the SearchBox results towards current map's viewport.
		map.addListener('bounds_changed', function() {
			searchBox.setBounds(map.getBounds());
		});

		var markers = [];
		// Listen for the event fired when the user selects a prediction and retrieve
		// more details for that place.
		searchBox.addListener('places_changed', function() {
			var places = searchBox.getPlaces();

			if (places.length == 0) {
				return;
			}

			// Clear out the old markers.
			markers.forEach(function(marker) {
				marker.setMap(null);
			});
			markers = [];

			// For each place, get the icon, name and location.
			var bounds = new google.maps.LatLngBounds();
			places.forEach(function(place) {
				if (!place.geometry) {
					console.log("Returned place contains no geometry");
					return;
				}
				var icon = {
					url: place.icon,
					size: new google.maps.Size(71, 71),
					origin: new google.maps.Point(0, 0),
					anchor: new google.maps.Point(17, 34),
					scaledSize: new google.maps.Size(25, 25)
				};

				// Create a marker for each place.
				markers.push(new google.maps.Marker({
					map: map,
					icon: icon,
					title: place.name,
					position: place.geometry.location
				}));

				if (place.geometry.viewport) {
					// Only geocodes have viewport.
					bounds.union(place.geometry.viewport);
				} else {
					bounds.extend(place.geometry.location);
				}
			});
			map.fitBounds(bounds);
		});

	}
	</script>
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

		//Datemask dd/mm/yyyy
		$("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
		//Datemask2 mm/dd/yyyy
		$("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
		//Money Euro
		$("[data-mask]").inputmask();
	</script>
@endpush
