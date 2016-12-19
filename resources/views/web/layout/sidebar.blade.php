<div class="col-md-3">
  <!-- start sidebar -->
  <aside class="mu-sidebar">
    <!-- start single sidebar -->
    @if(Request::is('properti'))
    <div class="mu-single-sidebar">
      <h3>Cari Properti</h3>
      <form class="form-horizontal" action="properti">
        <div class="box-body">
          <div class="col-md-12">
            <div class="form-group">
              <label class="control-label">Kisaran Harga</label>
              <input class="form-control" type="number" name="min_harga" placeholder="Minimal" value="{{ Request::get('min_harga') }}">
              <input class="form-control" type="number" name="max_harga" placeholder="Maksimal" value="{{ $max }}">
            </div>
            <div class="form-group">
              <label class="control-label">Jenis Properti</label>
              <div class="checkbox">
                @foreach ($types as $type)
                  <label><input type="radio" name="jenis[]" value="{{ $type->id }}" {{ in_array($type->id, $jenis) ? 'checked' : '' }}>{{ $type->nama }}</label>
                @endforeach
              </div>
            </div>
            
            <button type="submit" class="btn btn-danger pull-right">Cari</button>
          </div>
        </div>
      </form>
    </div>
    @endif

    <!-- start single sidebar -->
    <div class="mu-single-sidebar">
      <h3>Properti Populer</h3>
      <div class="mu-sidebar-popular-courses">
        @foreach($popular as $populer)
        <div class="media">
          <div class="media-left">
            <a>
              <img class="media-object" src="{{ asset('img/properti/small/' . $populer->gambar) }}" alt="img">
            </a>
          </div>
          <div class="media-body">
            <form action="/properti/{{ $populer->seo_judul }}" method="post">
              {{ method_field('PUT') }}
              {{ csrf_field() }}
              <button type="submit" style="border: 0; background: transparent; padding:0"><h4 class="media-heading"><a>{{ $populer->judul }}</a></h4></button>
            </form>
            <span class="popular-course-price">Rp {{ number_format("$populer->harga",2,",",".") }}</span>
          </div>
        </div>
        @endforeach
      </div>
    </div>
    <!-- end single sidebar -->

    <div class="mu-single-sidebar">
      <h3>Kategori Artikel</h3>
      <ul class="mu-sidebar-catg">
        @foreach ($kategori as $categories)
          <li><a href="/artikel-kategori/{{ $categories->nama }}">{{ $categories->nama }}</a></li>
        @endforeach
      </ul>
    </div>
    <!-- end single sidebar -->
  </aside>
  <!-- / end sidebar -->
</div>
