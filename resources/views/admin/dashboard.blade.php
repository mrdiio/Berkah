@extends('admin.layout')

@section('htmlheader_title')
	Dashboard
@endsection

@section('contentheader_title')
	Dashboard
@endsection

@section('main-content')
	<!-- Info boxes -->
	<div class="row">
			<div class="col-lg-4 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-aqua">
					<div class="inner">
						<h3>{{ $properti->count() }}</h3>

						<p>Properti</p>
					</div>
					<div class="icon">
						<i class="ion ion-ios-home"></i>
					</div>
					<a href="/admin-properti" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<!-- ./col -->
			<div class="col-lg-4 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-green">
					<div class="inner">
						<h3>{{ $galeri->count() }}</h3>

						<p>Galeri</p>
					</div>
					<div class="icon">
						<i class="ion ion-images"></i>
					</div>
					<a href="/admin-galeri" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<!-- ./col -->
			<div class="col-lg-4 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-yellow">
					<div class="inner">
						<h3>{{ $artikel->count() }}</h3>

						<p>Artikel</p>
					</div>
					<div class="icon">
						<i class="ion ion-ios-paper"></i>
					</div>
					<a href="/admin-artikel" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<!-- ./col -->
		</div>
		<!-- ./row -->

		<div class="row">
			<div class="col-md-7">
				<!-- TABLE: LATEST ORDERS -->
				<div class="box box-solid">
		      <div class="box-header with-border alert alert-info">
		        <h3 class="box-title">Properti Terbaru</h3>

		        <div class="box-tools pull-right">
		          <button type="button" class="btn btn-info btn-sm pull-right" data-widget="collapse"><i class="fa fa-minus"></i></button>
		        </div>
		      </div>
		      <!-- /.box-header -->
		      <div class="box-body">
		        <div class="table-responsive">
		          <table class="table no-margin">
		            <thead>
			            <tr>
			              <th>No.</th>
			              <th>Judul</th>
			              <th>Jenis</th>
			              <th>Harga (Rp)</th>
			            </tr>
		            </thead>
		            <tbody>
									@foreach ($property as $properti)
			            <tr>
			              <td>{{ $loop->iteration }}</td>
			              <td>{{ str_limit($properti->judul,50) }}</td>
			              <td>{{ $properti->jenis->nama }}</td>
			              <td>
			                <div class="sparkbar" data-color="#00a65a" data-height="20">{{ number_format("$properti->harga",2,",",".") }}</div>
			              </td>
			            </tr>
									@endforeach
		            </tbody>
		          </table>
		        </div>
		        <!-- /.table-responsive -->
		      </div>
		      <!-- /.box-body -->
		      <div class="box-footer clearfix">
		        <a href="/admin-properti/create" class="btn btn-sm btn-info btn-flat pull-left">Tambah Properti</a>
		        <a href="/admin-properti" class="btn btn-sm btn-danger btn-flat pull-right">Lihat Semua</a>
		      </div>
		      <!-- /.box-footer -->
		    </div>
		    <!-- /.box -->
		  </div>
		  <!-- /.col -->

			<div class="col-md-5">
				<!-- TABLE: LATEST ORDERS -->
				<div class="box box-solid">
		      <div class="box-header with-border alert alert-warning">
		        <h3 class="box-title">Artikel Terbaru</h3>

		        <div class="box-tools pull-right">
		          <button type="button" class="btn btn-warning btn-sm pull-right" data-widget="collapse"><i class="fa fa-minus"></i></button>
		        </div>
		      </div>
		      <!-- /.box-header -->
		      <div class="box-body">
		        <div class="table-responsive">
		          <table class="table no-margin">
		            <thead>
			            <tr>
			              <th>No.</th>
			              <th>Judul</th>
			              <th>Kategori</th>
			            </tr>
		            </thead>
		            <tbody>
									@foreach($article as $artikel)
			            <tr>
			              <td>{{ $loop->iteration }}</td>
			              <td>{{ str_limit($artikel->judul,20) }}</td>
			              <td>{{ $artikel->kategori->nama }}</td>
			            </tr>
									@endforeach
		            </tbody>
		          </table>
		        </div>
		        <!-- /.table-responsive -->
		      </div>
		      <!-- /.box-body -->
		      <div class="box-footer clearfix">
		        <a href="/admin-artikel/create" class="btn btn-sm btn-warning btn-flat pull-left">Tambah Artikel</a>
		        <a href="/admin-artikel" class="btn btn-sm btn-danger btn-flat pull-right">Lihat Semua</a>
		      </div>
		      <!-- /.box-footer -->
		    </div>
		    <!-- /.box -->
		  </div>
		  <!-- /.col -->
		</div>

		<div class="row">
			<div class="col-md-6">
          <div class="box box-solid">
            <div class="box-header with-border alert alert-success">
              <h3 class="box-title">Galeri</h3>

							<div class="box-tools pull-right">
			          <button type="button" class="btn btn-success btn-sm pull-right" data-widget="collapse"><i class="fa fa-minus"></i></button>
			        </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
									@foreach ($gallery as $i => $galeri)
                  	<li data-target="#carousel-example-generic" data-slide-to="{{$i}}" class="{{ ($i) ? '' : ' active' }}"></li>
									@endforeach
                </ol>
                <div class="carousel-inner">
									@foreach ($gallery as $i => $galeri)
	                  <div class="item {{ ($i) ? '' : ' active' }}">
	                    <img src="{{ asset('img/gallery/small/' . $galeri->gambar) }}" alt="First slide">
	                  </div>
									@endforeach
                </div>
                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                  <span class="fa fa-angle-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                  <span class="fa fa-angle-right"></span>
                </a>
              </div>
            </div>
            <!-- /.box-body -->
						<div class="box-footer clearfix">
							<a href="/admin-galeri#tambah" class="btn btn-sm btn-info btn-flat pull-left">Tambah Properti</a>
			        <a href="/admin-galeri" class="btn btn-sm btn-danger btn-flat pull-right">Lihat Semua</a>
			      </div>
			      <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
		</div>
@endsection
