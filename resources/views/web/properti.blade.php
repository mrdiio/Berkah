@extends('web.layout')

@section('web_title')
	{{$web-> title}}
@endsection

@section('page-title', 'Properti')

@section('breadcumb')
	Properti
@endsection

@section('web-content')
	<section id="mu-course-content">
	 	<div class="container">
	   	<div class="row">
	     	<div class="col-md-12">
	       	<div class="mu-course-content-area">
	          <div class="row">
	          	<div class="col-md-9">
	              <!-- start course content container -->
	              <div class="mu-course-container">
									@foreach(array_chunk($properti->all(), 2) as $row)
	                <div class="row">
										@foreach($row as $properties)
                    <div class="col-md-6 col-sm-6">
                    	<div class="mu-latest-course-single">
                      	<figure class="mu-latest-course-img">
                        	<a><img src="{{ asset('img/properti/small/' . $properties->gambar) }}" alt="img"></a>
                        	<figcaption class="mu-latest-course-imgcaption">
														<span style="margin-left: 5px"><i class="fa fa-eye"></i>{{ $properties->view_count }}</span>
                          	{{ $properties->jenis->nama }}
                          	<span><i class="fa fa-calendar"></i>{{ date('j F Y', strtotime($properties->created_at) ) }}</span>
                        	</figcaption>
                      	</figure>
                      	<div class="mu-latest-course-single-content">
                        	<h4>{{ $properties->judul }}</h4>
                        	<p>{!! str_limit($properties->deskripsi,140) !!}</p>
                        	<div class="mu-latest-course-single-contbottom">
														<form action="/properti/{{ $properties->seo_judul }}" method="post">
															{{ method_field('PUT') }}
															{{ csrf_field() }}
															<button type="submit" style="border: 0; background: transparent" class="pull-left"><a class="mu-course-details">Selengkapnya</a></button>
														</form>
                          	<span class="mu-course-price" href="#">Rp {{ number_format("$properties->harga",2,",",".") }}</span>
                        	</div>
                      	</div>
	                    </div>
	                  </div>
										@endforeach
                  </div>
									@endforeach
	              </div>
	              <!-- end course content container -->

								{{ $properti->appends(Request::only('min_harga','max_harga','jenis'))->links() }}
              </div>
              @include('web.layout.sidebar')
	          </div>
	        </div>
	      </div>
	    </div>
	  </div>
	</section>
@endsection
