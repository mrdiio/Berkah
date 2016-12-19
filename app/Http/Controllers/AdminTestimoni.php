<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Testimonial;
use Image;

class AdminTestimoni extends Controller
{
    //
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function index()
    {
      $testimoni = Testimonial::all();
      return view ('admin.testimonial', compact('testimoni'));
    }

    public function update(Request $request,$id)
    {
      $testimoni = Testimonial::find($id);

      $this->validate($request, [
        'nama' => 'required',
        'profesi' => 'required',
        'deskripsi' => 'max:200',
      ]);

      $data = $request->all();

      $testimoni->nama = $data['nama'];
      $testimoni->profesi = $data['profesi'];
      $testimoni->deskripsi = $data['deskripsi'];

      if($request->hasFile('gambar')){
        $gambar = $request->file('gambar');
        $filename = 'testimoni'. $testimoni->id . '.' . $gambar->getClientOriginalExtension();
        $path = public_path('img/testimoni/' . $filename);

        Image::make($gambar)->fit(200, 200)->save($path);

        $testimoni->gambar = $filename;
      }

      $testimoni->save();

      return redirect()->action('AdminTestimoni@index')->with('update', 'Input Success');
    }
}
