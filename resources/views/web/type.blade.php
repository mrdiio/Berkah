@extends('web.layout')

@section('web_title')
	{{ $web-> title }}
@endsection

@section('page-title')
	Properti : {{ $jenis->nama }}
@endsection
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
									@foreach(array_chunk($page->all(), 2) as $row)
	                <div class="row">
										@foreach ($row as $properti)
                    <div class="col-md-6 col-sm-6">
                    	<div class="mu-latest-course-single">
                      	<figure class="mu-latest-course-img">
                        	<a href="/properti/{{ $properti->id }}"><img src="{{ asset('img/properti/small/' . $properti->gambar) }}" alt="img"></a>
                        	<figcaption class="mu-latest-course-imgcaption">
                          	<a href="/jenis-properti/{{ $properti->jenis->id }}">{{ $properti->jenis->nama }}</a>
                          	<span><a><i class="fa fa-calendar"></i>{{ date('j F Y', strtotime($properti->created_at) ) }}</a></span>
                        	</figcaption>
                      	</figure>
                      	<div class="mu-latest-course-single-content">
                        	<h4><a href="/properti/{{ $properti->id }}">{{ $properti->judul }}</a></h4>
                        	<p>{!! str_limit($properti->deskripsi,140) !!}</p>
                        	<div class="mu-latest-course-single-contbottom">
                          	<a class="mu-course-details" href="/properti/{{ $properti->id }}">Details</a>
                          	<span class="mu-course-price" href="#">Rp {{ number_format("$properti->harga",2,",",".") }}</span>
                        	</div>
                      	</div>
	                    </div>
	                  </div>
										@endforeach
                  </div>
									@endforeach
	              </div>
	              <!-- end course content container -->

								{{$page->links()}}
              </div>
              @include('web.layout.sidebar')
	          </div>
	        </div>
	      </div>
	    </div>
	  </div>
	</section>
@endsection
