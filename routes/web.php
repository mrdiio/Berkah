<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

//Route Admin
	Auth::routes();

	Route::resource('admin', 'AdminDashboard');
	Route::resource('admin-user', 'AdminUser');
	Route::resource('admin-tentang', 'AdminAbout');
	Route::resource('admin-kontak', 'AdminContact');
	Route::resource('admin-slideshow', 'AdminSlide');
	Route::resource('deskripsi-web', 'AdminWeb');
	Route::resource('admin-galeri', 'AdminGallery');
	Route::resource('admin-properti', 'AdminProperti');
	Route::resource('admin-jenis', 'AdminJenis');
	Route::resource('admin-artikel', 'AdminArticle');
	Route::resource('admin-kategori', 'AdminKategori');
	Route::resource('admin-tim', 'AdminTeam');
	Route::resource('admin-testimoni', 'AdminTestimoni');

//Route Web Profile
	Route::resource('/', 'WebBerkah');
	Route::resource('properti', 'WebProperti');
	Route::resource('galeri', 'WebGallery');
	Route::resource('artikel', 'WebArtikel');
	Route::resource('jenis-properti', 'WebType');
	Route::resource('artikel-kategori', 'WebCategory');






	// Route::get('testlogin', function () {
	//     return view('auth.login-default');
	// });

	// Route::get('/', function () {
	//     return view('welcome');
	// });
