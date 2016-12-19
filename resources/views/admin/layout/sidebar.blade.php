<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">

        <img src="{{ asset('adminpage/img') }}/{{ Auth::user()->gambar}}" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>{{ Auth::user()->name }}</p>
        <h6>{{ Auth::user()->email }}</h6>
      </div>
    </div>

    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li class="header">HALAMAN ADMIN</li>
      <li class="{{ Request::is('admin') ? "active" : "" }}"><a href="/admin"><i class="fa fa-home"></i> <span>Beranda</span></a></li>
      <li class="{{ Request::is('admin-user') ? "active" : "" }}"><a href="/admin-user"><i class="fa fa-user"></i> <span>User</span></a></li>
      <li class="{{ Request::is('admin-tentang', 'admin-kontak', 'deskripsi-web') ? "active" : "" }} treeview">
        <a href="#">
          <i class="fa fa-building"></i> <span>Profil</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li class="{{ Request::is('admin-tentang') ? "active" : "" }}"><a href="/admin-tentang"><i class="fa fa-circle-o"></i> Tentang</a></li>
          <li class="{{ Request::is('admin-kontak') ? "active" : "" }}"><a href="/admin-kontak"><i class="fa fa-circle-o"></i> Kontak</a></li>
          <li class="{{ Request::is('admin-slideshow') ? "active" : "" }}"><a href="/admin-slideshow"><i class="fa fa-circle-o"></i> Slideshow</a></li>
          <li class="{{ Request::is('deskripsi-web') ? "active" : "" }}"><a href="/deskripsi-web"><i class="fa fa-circle-o"></i> Deskripsi Website</a></li>
        </ul>
      </li>
      <li class="{{ Request::is('admin-galeri') ? "active" : "" }}"><a href="/admin-galeri"><i class="fa fa-image"></i> <span>Galeri</span></a></li>
      <li class="{{ Request::is('admin-properti', 'admin-jenis') ? "active" : "" }} treeview">
        <a href="#">
          <i class="fa fa-building"></i> <span>Properti</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li class="{{ Request::is('admin-properti') ? "active" : "" }}"><a href="/admin-properti"><i class="fa fa-circle-o"></i> Semua Properti</a></li>
          <li class="{{ Request::is('admin-jenis') ? "active" : "" }}"><a href="/admin-jenis"><i class="fa fa-circle-o"></i> Jenis</a></li>
        </ul>
      </li>
      <li class="{{ Request::is('admin-tim') ? "active" : "" }}"><a href="/admin-tim"><i class="fa fa-image"></i> <span>Tim</span></a></li>
      <li class="{{ Request::is('admin-testimoni') ? "active" : "" }}"><a href="/admin-testimoni"><i class="fa fa-image"></i> <span>Testimoni</span></a></li>
      <li class="{{ Request::is('admin-artikel', 'artikel-kategori') ? "active" : "" }} treeview">
        <a href="#">
          <i class="fa fa-building"></i> <span>Artikel</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li class="{{ Request::is('admin-artikel') ? "active" : "" }}"><a href="/admin-artikel"><i class="fa fa-circle-o"></i> Semua Artikel</a></li>
          <li class="{{ Request::is('admin-kategori') ? "active" : "" }}"><a href="/admin-kategori"><i class="fa fa-circle-o"></i> Kategori</a></li>
        </ul>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
