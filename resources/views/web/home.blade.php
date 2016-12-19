@extends('web.layout1')

@section('web_title')
	{{$web->title}}
@endsection

@section('web_title')
	{{$web->description}}
@endsection

@section('keyword')
	{{$web->keyword}}
@endsection

@section('web-content')
  <!-- Start Slider -->
  <section id="mu-slider">

    <!-- Start single slider item -->
		@foreach($slide as $slides)
    <div class="mu-slider-single">
      <div class="mu-slider-img">
        <figure>
          <img src="{{ asset('img/slide/' . $slides->gambar) }}" alt="img" class="img-responsive">
        </figure>
      </div>
      <div class="mu-slider-content">
        <h4>{{ $slides->header }}</h4>
        <span></span>
        <h2>{{ $slides->judul }}</h2>

				@if ($slides->deskripsi !== '')
        	<p>{{ $slides->deskripsi }}</p>
				@endif

				@if ($slides->link !== '')
					<a href="{{ $slides->link }}" class="mu-read-more-btn">Read More</a>
				@endif
      </div>
    </div>
		@endforeach

  </section>
  <!-- End Slider -->

  <!-- Start about us -->
  <section id="mu-about-us">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-about-us-area">
            <div class="row">
              <div class="col-lg-6 col-md-6">
                <div class="mu-about-us-left">
                  <!-- Start Title -->
                  <div class="mu-title">
                    <h2>Tentang Kami</h2>
                  </div>
                  <!-- End Title -->
                  {!! $about->tentang !!}
                </div>
              </div>
              <div class="col-lg-6 col-md-6">
                <div class="mu-about-us-right">
                <a id="mu-abtus-video" href="{{$about->video}}" target="mutube-video">
                  <img class="img-responsive" src="img/{{ $about->cover_video }}" alt="img">
                </a>
                </div>
              </div>
            </div>
						<!-- Start visi & misi -->
						<div class="mu-visi-misi">
							<h2>Visi</h2>
							{!! $about->visi !!}

							<h2>Misi</h2>
							{!! $about->misi !!}
						</div>
						<!-- End visi & misi -->
						</div>
					</div>
        </div>
      </div>
    </div>
  </section>
  <!-- End about us -->

  <!-- Start latest course section -->
  <section id="project">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="mu-latest-courses-area">
            <!-- Start Title -->
            <div class="mu-title">
              <h2>Properti Terbaru</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio ipsa ea maxime mollitia, vitae voluptates, quod at, saepe reprehenderit totam aliquam architecto fugiat sunt animi!</p>
            </div>
            <!-- End Title -->
            <!-- Start latest course content -->
            <div id="mu-latest-course-slide" class="mu-latest-courses-content">
							@foreach($properti as $properties)
              <div class="col-lg-4 col-md-4 col-xs-12">
                <div class="mu-latest-course-single">
                  <figure class="mu-latest-course-img">
                    <a href="/properti/{{ $properties->id }}"><img src="{{ asset('img/properti/small/' . $properties->gambar) }}" alt="img"></a>
                    <figcaption class="mu-latest-course-imgcaption">
                      <a href="/jenis-properti/{{ $properties->jenis->id }}">{{ $properties->jenis->nama }}</a>
                      <span>{{ date('j F Y', strtotime($properties->created_at) ) }}</span>
                    </figcaption>
                  </figure>
                  <div class="mu-latest-course-single-content">
                    <h4><a href="/properti/{{ $properties->id }}">{{ $properties->judul }}</a></h4>
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
            <!-- End latest course content -->
						<div class="col-md-12">
							<a href="/properti" class="mu-view-all-btn pull-right">Lihat Semua</a>
						</div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End latest course section -->

  <!-- Start our teacher -->
  <section id="mu-our-teacher">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-our-teacher-area">
            <!-- begain title -->
            <div class="mu-title">
              <h2>TIM BERKAH PROPERTI</h2>
              <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa, repudiandae, suscipit repellat minus molestiae ea.</p> -->
            </div>
            <!-- end title -->
            <!-- begain our teacher content -->
            <div class="mu-our-teacher-content">
              <div class="row">
								@foreach ($team as $tim)
                <div class="col-lg-3 col-md-3 col-sm-6">
                  <div class="mu-our-teacher-single">
                    <figure class="mu-our-teacher-img">
                      <img src="{{ asset('img/tim/' . $tim->foto) }}" alt="teacher img" class="img-responsive">
                      <div class="mu-our-teacher-social">
                        <a href="{{ $tim->facebook }}"><span class="fa fa-facebook"></span></a>
                        <a href="{{ $tim->twitter }}"><span class="fa fa-twitter"></span></a>
                        <a href="{{ $tim->instagram }}"><span class="fa fa-instagram"></span></a>
                        <a href="{{ $tim->gplus }}"><span class="fa fa-google-plus"></span></a>
                      </div>
                    </figure>
                    <div class="mu-ourteacher-single-content text-center">
                      <h4>{{ $tim->nama }}</h4>
                      <span>{{ $tim->jabatan }}</span>
                    </div>
                  </div>
                </div>
								@endforeach
              </div>
            </div>
            <!-- End our teacher content -->
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End our teacher -->

  <!-- Start testimonial -->
  <section id="mu-testimonial">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-testimonial-area">
            <div id="mu-testimonial-slide" class="mu-testimonial-content">

							@foreach($testimoni as $testimonial)
							<!-- start testimonial single item -->
              <div class="mu-testimonial-item">
                <div class="mu-testimonial-quote">
                  <blockquote>
                    <p>{{ $testimonial->deskripsi }}</p>
                  </blockquote>
                </div>
                <div class="mu-testimonial-img">
                  <img src="{{ asset('img/testimoni/' . $testimonial->gambar) }}" alt="img">
                </div>
                <div class="mu-testimonial-info">
                  <h4>{{ $testimonial->nama }}</h4>
                  <span>{{ $testimonial->profesi }}</span>
                </div>
              </div>
              <!-- end testimonial single item -->
							@endforeach

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End testimonial -->

  <!-- Start from blog -->
  <section id="mu-from-blog">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-from-blog-area">
            <!-- start title -->
            <div class="mu-title">
              <h2>ARTIKEL</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum vitae quae vero ut natus. Dolore!</p>
            </div>
            <!-- end title -->
            <!-- start from blog content   -->
            <div class="mu-from-blog-content">
              <div class="row">
								@foreach ($article as $artikel)
                <div class="col-md-4 col-sm-4">
                  <article class="mu-blog-single-item">
                    <figure class="mu-blog-single-img">
                      <a href="/artikel/{{ $artikel->id }}"><img src="{{ asset('img/artikel/small/' .  $artikel->gambar) }}" alt="img"></a>
                      <figcaption class="mu-blog-caption">
                        <h3><a href="/artikel/{{ $artikel->id }}">{{ $artikel->judul }}</a></h3>
                      </figcaption>
                    </figure>
                    <div class="mu-blog-meta">
											<a><span><i class="fa fa-calendar"></i>{{ date('j F Y', strtotime($artikel->created_at) ) }}</span></a>
											<a href="/artikel-kategori/{{ $artikel->kategori->id }}"><span><i class="fa fa-folder-open"></i>{{ $artikel->kategori->nama }}</span></a>
                    </div>
                    <div class="mu-blog-description">
                      <p>{!! str_limit($artikel->deskripsi,140) !!}</p>
                      <a class="mu-read-more-btn" href="/artikel/{{ $artikel->id }}">Read More</a>
                    </div>
                  </article>
                </div>
								@endforeach
              </div>
            </div>
            <!-- end from blog content   -->
						<div class="col-md-12">
							<a href="/artikel" class="mu-view-all-btn pull-right">Lihat Semua</a>
						</div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End from blog -->
@endsection
