<!-- Start menu -->
<section id="mu-menu">
  <nav class="navbar navbar-default" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <!-- LOGO -->

        <!-- IMG BASED LOGO  -->
        <a class="navbar-brand" href="/">
          <img src="{{ asset('img/' . $about->logo) }}" class="pull-left" width="40" alt="logo">
          <span>{{$about->nama}}</span>
        </a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul id="top-menu" class="nav navbar-nav navbar-right main-nav">
          <li class="{{ Request::is("/") ? "active" : "" }}"><a href="/">Beranda</a></li>
		      <li class="{{ Request::is("properti") ? "active" : "" }}"><a href="/properti">Properti</a></li>
          <li class="{{ Request::is("galeri") ? "active" : "" }}"><a href="/galeri">Galeri</a></li>
		      <li class="{{ Request::is("artikel") ? "active" : "" }}"><a href="/artikel">Artikel</a></li>
          <!-- <li><a href="#" id="mu-search-icon"><i class="fa fa-search"></i></a></li> -->
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </nav>
</section>
<!-- End menu -->

<!-- Start search box -->
<!-- <div id="mu-search">
  <div class="mu-search-area">
    <button class="mu-search-close"><span class="fa fa-close"></span></button>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <form class="mu-search-form">
            <input type="search" placeholder="Type Your Keyword(s) & Hit Enter">
          </form>
        </div>
      </div>
    </div>
  </div>
</div> -->
<!-- End search box -->
