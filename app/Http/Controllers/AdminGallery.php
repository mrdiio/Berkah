<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Image;
use App\Gallery;
use App\Filter;

use Illuminate\Support\Facades\Session;

class AdminGallery extends Controller
{
    //
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function index()
    {
      $galeri = Gallery::orderBy('id', 'desc')->paginate(9);
      $filter = Filter::all();
      return view ('admin.gallery', compact('galeri','filter'));
    }

    public function store(Request $request)
    {
      $galeri = new Gallery;

      $this->validate($request, [
        'judul' => 'required|max:50',
        'gambar' => 'required',
        'filter' => 'required',
      ]);

      $data = $request->all();

      $galeri->judul = $data['judul'];
      $galeri->filter_id = $data['filter'];

      if($request->hasFile('gambar')){
        $gambar = $request->file('gambar');
        $filename = time() . '.' . $gambar->getClientOriginalExtension();
        $path1 = public_path('img/gallery/big/' . $filename);
        $path2 = public_path('img/gallery/small/' . $filename);

        Image::make($gambar)->resize(1920, null, function ($constraint) {
                              $constraint->aspectRatio();})
                            ->save($path1);
        Image::make($gambar)->fit(750, 500)->save($path2);

        $galeri->gambar = $filename;
      }

      $galeri->save();

      return redirect()->action('AdminGallery@index')->with('simpan', 'Input Success');
    }

    public function update(Request $request,$id)
    {
      $galeri = Gallery::find($id);

      $this->validate($request, [
        'judul' => 'required|max:50',
        'filter' => 'required',
      ]);

      $data = $request->all();

      $galeri->judul = $data['judul'];
      $galeri->filter_id = $data['filter'];

      if($request->hasFile('gambar')){
        $gambar = $request->file('gambar');
        $filename = $galeri->id . '.' . $gambar->getClientOriginalExtension();
        $path1 = public_path('img/gallery/big/' . $filename);
        $path2 = public_path('img/gallery/small/' . $filename);

        Image::make($gambar)->resize(1920, null, function ($constraint) {
                              $constraint->aspectRatio();})
                            ->save($path1);
        Image::make($gambar)->fit(750, 500)->save($path2);

        $galeri->gambar = $filename;
      }

      $galeri->save();

      return redirect()->action('AdminGallery@index')->with('simpan', 'Input Success');
    }

    public function destroy($id)
    {
      $galeri = Gallery::find($id);
      $galeri->delete();

      return redirect()->action('AdminGallery@index')->with('hapus', 'Delete Success');
    }

}
