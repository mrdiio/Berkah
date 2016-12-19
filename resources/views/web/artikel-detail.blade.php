@extends('web.layout')

@section('web_title')
	{{$web-> title}}
@endsection

@section('page-title', 'Artikel Detail')

@section('breadcumb')
	Artikel Detail
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
						 	<div class="mu-course-container mu-blog-single">
							 	<div class="row">
								 	<div class="col-md-12">
									 	<article class="mu-blog-single-item">
										 	<figure class="mu-blog-single-img">
											 	<a href="/artikel/{{ $artikel->id }}"><img alt="img" src="{{ asset('img/artikel/big/' . $artikel->gambar) }}"></a>
											 	<figcaption class="mu-blog-caption">
												 	<h3><a href="/artikel/{{ $artikel->id }}">{{ $artikel->judul }}</a></h3>
											 	</figcaption>
										 	</figure>
										 	<div class="mu-blog-meta">
											 	<a>{{ date('j F Y', strtotime($artikel->created_at) ) }}</a>
										 	</div>
										 	<div class="mu-blog-description">
											 	<p>{!! $artikel->deskripsi !!}</p>
										 	</div>
									 	</article>
								 	</div>
							 	</div>
						 	</div>
						 	<!-- end course content container -->
						 	<!-- start related course item -->
							<div class="row">
							 	<div class="col-md-12">
								 	<div class="mu-related-item">
									 	<h3>Artikel Terkait</h3>
									 	<div class="mu-related-item-area">
										 	<div id="mu-related-item-slide">
												@foreach($terkait as $related)
											 	<div class="col-md-6">
													<article class="mu-blog-single-item">
													 	<figure class="mu-blog-single-img">
														 	<a href="/artikel/{{ $related->id }}"><img alt="img" src="{{ asset('img/artikel/small/' . $related->gambar) }}"></a>
														 	<figcaption class="mu-blog-caption">
															 	<h3><a href="/artikel/{{ $related->id }}">{{ $related->judul }}</a></h3>
														 	</figcaption>
													 	</figure>
													 	<div class="mu-blog-meta">
														 	<a href="#">{{ date('j F Y', strtotime($related->created_at) ) }}</a>
													 	</div>
													 	<div class="mu-blog-description">
														 	<p>{!! str_limit($related->deskripsi,140) !!}</p>
														 	<a href="/artikel/{{ $related->id }}" class="mu-read-more-btn">Read More</a>
													 	</div>
												 	</article>
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
@endsection
