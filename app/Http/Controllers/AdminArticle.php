<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;

use App\Article;
use App\Category;

class AdminArticle extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $artikel = Article::orderBy('id', 'desc')->get();
      return view('admin.artikel', compact('artikel'));

    }

    public function create()
    {
      $kategori = Category::all();
      return view('admin.artikel-tambah', compact('kategori'));
    }

    public function store(Request $request)
    {
      $this->validate($request, [
        'judul' => 'required',
        'kategori' => 'required',
        'gambar' => 'required',
        'deskripsi' => 'required',
      ]);

      $artikel = new Article;
      $data = $request->all();

      $artikel->judul = $data['judul'];
      $artikel->category_id = $data['kategori'];
      $artikel->deskripsi = $data['deskripsi'];

      if($request->hasFile('gambar')){
        $gambar = $request->file('gambar');
        $filename = time() . '.' . $gambar->getClientOriginalExtension();
        $path1 = public_path('img/artikel/big/' . $filename);
        $path2 = public_path('img/artikel/small/' . $filename);

        Image::make($gambar)->resize(1920, null, function ($constraint) {
                              $constraint->aspectRatio();})
                            ->save($path1);
        Image::make($gambar)->fit(750, 500)->save($path2);

        $artikel->gambar = $filename;
      }

      $artikel->save();

      return redirect()->action('AdminArticle@index')->with('simpan', 'Input Success');
    }

    public function edit($id)
    {
      $artikel = Article::find($id);
      $kategori = Category::all();
      return view('admin.artikel-edit', compact('artikel', 'kategori'));
    }

    public function update(Request $request,$id)
    {
      $this->validate($request, [
        'judul' => 'required',
        'kategori' => 'required',
        'deskripsi' => 'required',
      ]);

      $artikel = Article::find($id);
      $data = $request->all();

      $artikel->judul = $data['judul'];
      $artikel->category_id = $data['kategori'];
      $artikel->deskripsi = $data['deskripsi'];

      if($request->hasFile('gambar')){
        $gambar = $request->file('gambar');
        $filename = $artikel->gambar . '.' . $gambar->getClientOriginalExtension();
        $path1 = public_path('img/artikel/big/' . $filename);
        $path2 = public_path('img/artikel/small/' . $filename);

        Image::make($gambar)->resize(1920, null, function ($constraint) {
                              $constraint->aspectRatio();})
                            ->save($path1);
        Image::make($gambar)->fit(750, 500)->save($path2);

        $artikel->gambar = $filename;
      }

      $artikel->save();

      return redirect()->action('AdminArticle@index')->with('simpan', 'Input Success');
    }

    public function destroy($id)
    {
      $artikel = Article::find($id);
      $artikel->delete();

      return redirect()->action('AdminArticle@index')->with('hapus', 'Delete Success');
    }

}
