@extends('web.layout')

@section('web_title')
	{{$web-> title}}
@endsection

@section('page-title', 'Properti Detail')

@section('breadcumb')
	Properti Detail
@endsection

@push('css')
	<style media="screen">
		#map-canvas {
			height: 300px;
			padding: 0px;
			margin: 20px 0;
		}
	</style>
@endpush

@section('web-content')
<section id="mu-course-content">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="mu-course-content-area">
            <div class="row">
              <div class="col-md-9">
                <!-- start course content container -->
                <div class="mu-course-container mu-course-details">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="mu-latest-course-single">
                        <figure class="mu-latest-course-img">
                          <a><img src="{{ asset('img/properti/big/' . $properti->gambar) }}" alt="img"></a>
                          <figcaption class="mu-latest-course-imgcaption">
                            <span><i class="fa fa-clock-o"></i>{{ date('j F Y', strtotime($properti->created_at) ) }}</span>
														<span>{{ $properti->jenis->nama }} &nbsp;</span>
                          </figcaption>
                        </figure>
                        <div class="mu-latest-course-single-content">
													<h2><a href="#">{{ $properti->judul }}</a></h2>
                          <h4>Informasi Properti</h4>
		                        <ul>
															<div class="row">
																<div class="col-md-6 col-sm-6">
				                          <li> <span>Harga</span> <span>: Rp {{ number_format("$properti->harga",2,",",".") }}</span></li>
																</div>
																<div class="col-md-6 col-sm-6">
																	<li> <span>Sertifikat</span> <span>: {{ $properti->sertifikat }}</span></li>
																</div>
																<div class="col-md-6 col-sm-6">
				                          <li> <span>Luas Tanah</span> <span>: {{ $properti->luas }} m<sup>2</sup></span></li>
																</div>
																<div class="col-md-6 col-sm-6" {{ ($properti->luas_bangunan == 0) ? 'hidden' : '' }}>
				                          <li> <span>Luas Bangunan</span> <span>: {{ $properti->luas_bangunan }} m<sup>2</sup></span></li>
																</div>
																<div class="col-md-6 col-sm-6" {{ ($properti->kamar_tidur == 0) ? 'hidden' : '' }}>
				                          <li> <span>Kamar Tidur</span> <span>: {{ $properti->kamar_tidur }} </span></li>
																</div>
																<div class="col-md-6 col-sm-6" {{ ($properti->kamar_mandi == 0) ? 'hidden' : '' }}>
				                          <li> <span>Kamar Mandi</span> <span>: {{ $properti->kamar_mandi }} </span></li>
																</div>
																<div class="col-md-6 col-sm-6" {{ ($properti->lantai == 0) ? 'hidden' : '' }}>
				                          <li> <span>Lantai</span> <span>: {{ $properti->lantai }} </span></li>
																</div>
																<div class="col-md-6 col-sm-6" {{ ($properti->watt == 0) ? 'hidden' : '' }}>
				                          <li> <span>Daya Listrik</span> <span>: {{ $properti->watt }} </span></li>
																</div>
															</div>
		                        </ul>
													<h4>Lokasi</h4>
														<ul>
															<li> <span>Alamat</span> <span>: {{ $properti->alamat }}</span></li>
															<li> <div id="map-canvas"></div></li>
														</ul>
                          <h4>Deskripsi</h4>
                          	{!! $properti->deskripsi !!}
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end course content container -->
                <!-- start related course item -->
                <div class="row">
                  <div class="col-md-12">
                    <div class="mu-related-item">
		                  <h3>Properti Terkait</h3>
		                  <div class="mu-related-item-area">
		                    <div id="mu-related-item-slide">

													@foreach ($terkait as $related)
		                      <div class="col-md-6">
		                        <div class="mu-latest-course-single">
		                          <figure class="mu-latest-course-img">
		                            <a><img alt="img" src="{{ asset('img/properti/small/' . $related->gambar) }}"></a>
		                            <figcaption class="mu-latest-course-imgcaption">
		                              {{ $related->jenis->nama }}
		                              <span><i class="fa fa-clock-o"></i>{{ date('j F Y', strtotime($related->created_at) ) }}</span>
		                            </figcaption>
		                          </figure>
		                          <div class="mu-latest-course-single-content">
		                            <h4>{{ $related->judul }}</h4>
		                            <p>{!! str_limit($related->deskripsi,140) !!}</p>
		                            <div class="mu-latest-course-single-contbottom">
																	<form action="/properti/{{ $related->seo_judul }}" method="post">
																		{{ method_field('PUT') }}
																		{{ csrf_field() }}
																		<button type="submit" style="border: 0; background: transparent" class="pull-left"><a class="mu-course-details">Selengkapnya</a></button>
																	</form>
		                              <span href="#" class="mu-course-price">Rp {{ number_format("$related->harga",2,",",".") }}</span>
		                            </div>
		                          </div>
		                        </div>
		                      </div>
													@endforeach
		                    </div>
		                  </div>
		                </div>
                  </div>
                </div>
                <!-- end start related course item -->
              </div>
              @include('web.layout.sidebar')
           </div>
         </div>
       </div>
     </div>
   </div>
 	</section>

	<div id="mu-footer-kontak">
	<div class="container">
  <div class="row">
    <div class="col-lg-7 col-md-8 col-sm-10 col-xs-9">
			<div class="mu-kontak">
				<div class="mu-kontak-area">
					<div class="col-xs-12">
						<a>Hubungi Kami :</a>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-12">
						<a><span class="glyphicon glyphicon-phone-alt"></span> {{ $contact->phone }}</a>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-12">
						<a><span class="glyphicon glyphicon-phone"></span> {{ $contact->bbm }}</a>
					</div>
					<div class="col-md-4 col-sm-4 col-xs-12">
						<a href="{{ $contact->facebook }}" target="_blank"><span class="fa fa-facebook"></span> Berkah Properti</a>
					</div>
				</div>
			</div>
    </div>
  </div>
	</div>
</div>
@endsection

@push('js')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAK8ga87Ny5F2mb3SX3U6-TwIxUQZGMy1c&libraries=places&callback=initMap"
	async defer></script>
<script type="text/javascript">
	var map;
	var latEdit = {{ $properti->lat }};
	var lngEdit = {{ $properti->lng }};
	var editPosition = {lat: latEdit, lng: lngEdit}; //posisi berkah properti
	var marker;

	function initMap() {
		map = new google.maps.Map(document.getElementById('map-canvas'), {
			center: editPosition,
			zoom: 17,
		});
		marker = new google.maps.Marker({
	    position: editPosition,
	    map: map,
	  });
	}
</script>
@endpush
