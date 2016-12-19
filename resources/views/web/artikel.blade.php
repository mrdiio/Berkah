@extends('web.layout')

@section('web_title')
	{{$web-> title}}
@endsection

@section('page-title', 'Artikel')

@section('breadcumb')
	Artikel
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
                <div class="mu-course-container mu-blog-archive">
									@foreach (array_chunk($artikel->all(), 2) as $row)
                  <div class="row">
										@foreach($row as $articles)
                    <div class="col-md-6 col-sm-6">
                      <article class="mu-blog-single-item">
                        <figure class="mu-blog-single-img">
                          <a href="/artikel/{{ $articles->id }}"><img src="{{ asset('img/artikel/small/' . $articles->gambar) }}" alt="img"></a>
                          <figcaption class="mu-blog-caption">
                            <h3><a href="/artikel/{{ $articles->id }}">{{ $articles->judul }}</a></h3>
                          </figcaption>
                        </figure>
                        <div class="mu-blog-meta">
													<a><span><i class="fa fa-calendar"></i>{{ date('j F Y', strtotime($articles->created_at) ) }}</span></a>
													<a href="/artikel-kategori/{{ $articles->kategori->id }}"><span><i class="fa fa-folder-open"></i>{{ $articles->kategori->nama }}</span></a>
                        </div>
                        <div class="mu-blog-description">
                          <p>{!! str_limit($articles->deskripsi,140) !!}</p>
                          <a class="mu-read-more-btn" href="/artikel/{{ $articles->id }}">Read More</a>
                        </div>
                      </article>
                    </div>
										@endforeach
                  </div>
									@endforeach
                </div>
                <!-- end course content container -->

                <!-- start course pagination -->
									{{ $artikel->links() }}
                <!-- end course pagination -->
              </div>
              @include('web.layout.sidebar')
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
 @endsection
