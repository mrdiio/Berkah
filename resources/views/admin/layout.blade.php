<!DOCTYPE html>
<html>
  <head>
      @include('admin.layout.htmlheader')
  </head>

  <body class="hold-transition skin-red sidebar-mini">
    <div class="wrapper">
      @include('admin.layout.navbar')
      @include('admin.layout.sidebar')

      <div class="content-wrapper">
        @include('admin.layout.contentheader')
        <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
            @yield('main-content')
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      @include('admin.layout.footer')
    </div>

    @include('admin.layout.scripts')
  </body>
</html>
