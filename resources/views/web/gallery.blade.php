@extends('web.layout')

@section('web_title')
	{{$web-> title}}
@endsection

@section('page-title', 'Galeri')

@section('breadcumb')
	Galeri
@endsection


@section('web-content')
<!-- Start gallery  -->
 <section id="mu-gallery">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="mu-gallery-area">
          <!-- start title -->
          <div class="mu-title">
            <h2>Some Moments</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores ut laboriosam corporis doloribus, officia, accusamus illo nam tempore totam alias!</p>
          </div>
          <!-- end title -->
          <!-- start gallery content -->
          <div class="mu-gallery-content">
            <!-- Start gallery menu -->
            <div class="mu-gallery-top">
              <ul>
                <li class="filter active" data-filter="all">Semua</li>
								@foreach($filter as $filters)
                <li class="filter" data-filter=".{{ $filters->id }}">{{ $filters->nama }}</li>
								@endforeach
              </ul>
            </div>
            <!-- End gallery menu -->
            <div class="mu-gallery-body">
              <ul id="mixit-container" class="row">
                <!-- start single gallery image -->
								@foreach($gallery as $galeri)
                <li class="col-md-4 col-sm-6 col-xs-12 mix {{ $galeri->filter_id }}">
                  <div class="mu-single-gallery">
                    <div class="mu-single-gallery-item">
                      <div class="mu-single-gallery-img">
                        <a href="#"><img alt="img" src="{{ asset('img/gallery/small/' . $galeri->gambar) }}"></a>
                      </div>
                      <div class="mu-single-gallery-info">
                        <div class="mu-single-gallery-info-inner">
                          <p>{{ ucwords($galeri->judul) }}</p>
                          <a href="{{ asset('img/gallery/big/' . $galeri->gambar) }}" data-fancybox-group="gallery" class="fancybox"><span class="fa fa-eye"></span></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
								@endforeach
              </ul>
            </div>
						{{ $gallery->links() }}
          </div>
          <!-- end gallery content -->
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- End gallery  -->
@endsection
