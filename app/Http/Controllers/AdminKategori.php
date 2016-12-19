<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;

use App\Category;

class AdminKategori extends Controller
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
      $kategori = Category::orderBy('id', 'desc')->get();
      return view('admin.kategori', compact('kategori'));

    }

    public function store(Request $request)
    {
      $this->validate($request, [
        'kategori' => 'required',
      ]);

      $kategori = new Category;
      $data = $request->all();

      $kategori->nama = $data['kategori'];
      $kategori->save();

      return redirect()->action('AdminKategori@index')->with('simpan', 'Input Success');
    }

    public function update(Request $request,$id)
    {
      $this->validate($request, [
        'kategori' => 'required',
      ]);

      $kategori = Category::find($id);
      $data = $request->all();

      $kategori->nama = $data['kategori'];
      $kategori->save();
      return redirect()->action('AdminKategori@index')->with('simpan', 'Input Success');
    }

    public function destroy($id)
    {
      $kategori = Category::find($id);
      $kategori->delete();

      return redirect()->action('AdminKategori@index')->with('hapus', 'Delete Success');
    }

}
