<!DOCTYPE html>
<html>
  @section('htmlheader')
    @include('web.layout.htmlheader')
  @show

  <body>

    <!--START SCROLL TOP BUTTON -->
      <a class="scrollToTop" href="#">
        <i class="fa fa-angle-up"></i>
      </a>
    <!-- END SCROLL TOP BUTTON -->

    @include('web.layout.navbar')

      <!-- Your Page Content Here -->
      @yield('web-content')

    @include('web.layout.footer')

    @include('web.layout.scripts')

  </body>
</html>
